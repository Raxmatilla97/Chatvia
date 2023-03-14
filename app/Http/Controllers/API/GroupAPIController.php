<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateGroupRequest;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\User;
use App\Repositories\GroupRepository;
use Auth;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroupAPIController extends AppBaseController
{
    /** @var GroupRepository */
    private $groupRepository;

    /**
     * Create a new controller instance.
     *
     * @param  GroupRepository  $groupRepo
     */
    public function __construct(GroupRepository $groupRepo)
    {
        $this->groupRepository = $groupRepo;
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $groups = $this->groupRepository->all();

        $groups = $groups->map(function ($group) {
            return [
                'id'        => $group->id,
                'name'      => $group->name,
                'photo_url' => $group->photo_url,
            ];
        });

        return $this->sendResponse($groups->toArray(), 'Guruhlar muvaffaqiyatli topildi.');
    }

    /**
     * @param  Group  $group
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function show(Group $group, Request $request)
    {
        $users = $group->users->pluck('id')->toArray();
        $group = $group->toArray();
        $group['users'] = $users;

        return $this->sendResponse($group, 'Guruh muvaffaqiyatli olindi.');
    }

    /**
     * @param  CreateGroupRequest  $request
     *
     * @return JsonResponse
     */
    public function create(CreateGroupRequest $request)
    {
        $input = $request->all();
        $input['group_type'] = ($input['group_type'] == "1") ? Group::TYPE_OPEN : Group::TYPE_CLOSE;
        $input['privacy'] = ($input['privacy'] == "1") ? Group::PRIVACY_PUBLIC : Group::PRIVACY_PRIVATE;
        $input['created_by'] = getLoggedInUserId();

        $group = $this->groupRepository->store($input);
        $group->append('group_created_by');

        return $this->sendResponse($group, 'Guruh muvaffaqiyatli yaratildi.');
    }

    /**
     * @param  Group  $group
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function update(Group $group, Request $request)
    {
        $input = $request->all();
        unset($input['users']);

        if ($group->my_role === GroupUser::ROLE_ADMIN) {
            $input['group_type'] = ($input['group_type'] == "1") ? Group::TYPE_OPEN : Group::TYPE_CLOSE;
            $input['privacy'] = ($input['privacy'] == "1") ? Group::PRIVACY_PUBLIC : Group::PRIVACY_PRIVATE;
        } else {
            unset($input['group_type']);
            unset($input['privacy']);
        }

        list($group, $conversation) = $this->groupRepository->update($input, $group->id);

        return $this->sendResponse(
            ['group' => $group->toArray(), 'conversation' => $conversation], 'Guruh tafsilotlari muvaffaqiyatli yangilandi.'
        );
    }

    /**
     * @param  Group  $group
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function addMembers(Group $group, Request $request)
    {
        if ($group->privacy == Group::PRIVACY_PRIVATE && !$this->groupRepository->isAuthUserGroupAdmin($group->id)) {
            return $this->sendError('Guruhga faqat administrator foydalanuvchi qoʻshishi mumkin');
        }
        $users = $request->get('members');

        /** @var User $addedMembers */
        list($addedMembers, $conversation) = $this->groupRepository->addMembersToGroup($group, $users);
        $group = $group->toArray();
        $group['users'] = $addedMembers;

        return $this->sendResponse(['group' => $group, 'conversation' => $conversation], 'A’zolar muvaffaqiyatli qo‘shildi.');
    }

    /**
     * @param  Group  $group
     * @param  User  $user
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function removeMemberFromGroup(Group $group, User $user)
    {
        $conversation = $this->groupRepository->removeMemberFromGroup($group, $user);

        return $this->sendResponse($conversation, 'Aʼzo olib tashlandi.');
    }

    /**
     * @param  Group  $group
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function leaveGroup(Group $group)
    {
        $group->users;
        $conversation = $this->groupRepository->leaveGroup($group, Auth::id());

        return $this->sendResponse($conversation, 'Siz bu guruhni tark etdingiz.');
    }

    /**
     * @param  Group  $group
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function removeGroup(Group $group)
    {
        $this->groupRepository->removeGroup($group, Auth::id());

        return $this->sendSuccess('Siz bu guruhni oʻchirib tashladingiz');
    }

    /**
     * @param  Group  $group
     * @param  User  $user
     *
     * @return JsonResponse
     */
    public function makeAdmin(Group $group, User $user)
    {
        $conversation = $this->groupRepository->makeMemberToGroupAdmin($group, $user);

        return $this->sendResponse($conversation, $user->name.' endi yangi admin.');
    }

    /**
     * @param  Group  $group
     * @param  User  $user
     *
     * @return JsonResponse
     */
    public function dismissAsAdmin(Group $group, User $user)
    {
        $conversation = $this->groupRepository->dismissAsAdmin($group, $user);

        return $this->sendResponse($conversation, $user->name.' administrator rolidan muvaffaqiyatli ozod qilindi.');
    }
}