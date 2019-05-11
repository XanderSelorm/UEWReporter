<div class="modal fade" id="publishModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Publish Announcement</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @include('inc.messages')
            <div class="modal-body">
              <form class="form center-block">
                  {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST',]) !!}
                      <div class="form-group">
                              {{Form::label('title','Title')}}
                              {{Form::text('title','', ['class' => 'form-control', 'placeholder' => 'Announcement Title...'])}}
                      </div>
                      <div class="form-group">
                          {{Form::label('body','Body')}}
                          {{Form::textarea('body','', ['class' => 'form-control', 'placeholder' => 'Announcement Content...'])}}
                      </div>

                      {{Form::submit('Submit', ['class' => 'btn btn-primary pull-right'])}}
                  {!! Form::close() !!}
              </div>
            </div>
            <div class="modal-footer">
                            
            </div>
          </div>
        </div>
</div>
      