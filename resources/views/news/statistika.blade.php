    <div class="docs-example col-lg-12">
                            <div class="row">
                            <div class="col-sm-2">
                                <div class="callout callout-info">
                                <small class="text-muted">Barcha aktive yangiliklar</small><br>
                                <strong class="h4">{{ $news->where('is_active', '=', '1')->count() }} ta</strong>
                                </div>
                            </div><!--/.col-->
                            <div class="col-sm-2">
                                <div class="callout callout-danger">
                                <small class="text-muted">Aktive bo'lishi kutilayotgan yangiliklar</small><br>
                                <strong class="h4">{{ $news->where('is_active', '=', '0')->count() }} ta</strong>
                                </div>
                            </div><!--/.col-->
                            <div class="col-sm-2">
                                <div class="callout callout-warning">
                                <small class="text-muted">Tasdiqlash jarayonidagi yangiliklar</small><br>
                                <strong class="h4">{{ $news->where('is_ready', '=', '0')->count() }} ta</strong>
                                </div>
                            </div><!--/.col-->
                            <div class="col-sm-2">
                                <div class="callout callout-success">
                                <small class="text-muted">Tasdiqlangan yangiliklar</small><br>
                                <strong class="h4">{{ $news->where('is_ready', '=', '1')->count() }} ta</strong>
                                </div>
                            </div><!--/.col-->
                            <div class="col-sm-2">
                                <div class="callout">
                                <small class="text-muted">Umumiy ko'rishlar soni</small><br>
                                <strong class="h4">{{ isset($db->number) }} martda</strong>
                                </div>
                            </div><!--/.col-->
                            <div class="col-sm-2">
                                <div class="callout callout-primary">
                                <small class="text-muted">Moderator</small><br>
                                <strong class="h4">ADMIN</strong>
                                </div>
                            </div><!--/.col-->
                            </div><!--/.row-->
                           
                            </div>
                           
                        </div>