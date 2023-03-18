<div class="table-responsive-sm">
    <table class="table table-striped" id="onlineVideoDarss-table">
        <thead>
            <tr>
                <th>Video dars nomlanishi</th>    
                <th>Dars turi</th>
                <th>Bo'lish vaqti (kun/oy/yil)</th>
                <th>Holati</th>               
                <th>Yaratgan</th>
                <th colspan="3">Amallar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($onlineVideoDars as $onlineVideoDars)      
                
                    @if($onlineVideoDars->is_active == 1)                
                        <tr>
                            <td>
                                <a href="{{ route('onlineVideoDars.show', [$onlineVideoDars->id]) }}"><b>{{ $onlineVideoDars->title }}</b></a>                           
                            </td>                       
                            <td>
                                @if($onlineVideoDars->jit_meet_url != "")
                                    @if($onlineVideoDars->online_dars_holati == "hali_boshlanmagan")
                                        <p class="btn btn-warning btn-sm text-white"><b>Dars boshlanmagan!</b></p>
                                    @elseif($onlineVideoDars->online_dars_holati == "dars_boshlangan")
                                        <p class="btn btn-success btn-sm text-white"><b>Dars boshlangan!</b></p>
                                    @elseif($onlineVideoDars->online_dars_holati == "dars_tugagan")
                                        <p class="btn btn-danger btn-sm text-white"><b>Dars tugagan!</b></p>
                                    @endif                                   
                                @else
                                    @if($onlineVideoDars->yutube_video_url != "")
                                        <p class="btn btn-success btn-sm text-white"><b>Yutubedan video dars!</b></p>
                                    @else
                                        <p class="btn btn-info btn-sm text-white"><b>Youtubedan video yo'q!</b></p>
                                    @endif   
                                @endif                      
                            </td>
                            <td>
                                <b style="color: blue;">{{ $onlineVideoDars->qachon_boladi}} {{ $onlineVideoDars->qachon_boladi_soat}}</b>
                            </td>                    
                            <td>
                                @if($onlineVideoDars->is_active == 1)
                                    <p class="btn btn-success btn-sm">Aktiv</p>
                                @else
                                    <p class="btn btn-danger btn-sm">No Aktiv</p>
                                @endif
                            </td>   
                            <td>{{ $onlineVideoDars->user->name }}</td>
                            <td>
                                {!! Form::open(['route' => ['onlineVideoDars.destroy', $onlineVideoDars->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>                                  
                                    <a href="{{ route('onlineVideoDars.show', [$onlineVideoDars->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                                    @if(Auth::user()->hasRole('Admin'))
                                        <a href="{{ route('onlineVideoDars.edit', [$onlineVideoDars->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Qaroriz qatiymi?')"]) !!}
                                    @endif
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endif
              
            @endforeach
        </tbody>
    </table>
</div>