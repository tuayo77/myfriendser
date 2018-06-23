<div class="profile-information">
    @if($my_profile)
        <div class="edit-button">
            <div class="button-frame">
                <a href="javascript:;" data-toggle="modal" data-target="#profileInformation">
                    <i class="fa fa-pencil"></i>
                    modifier
                </a>
            </div>
        </div>
    @endif
    <ul class="list-group">
        <li class="list-group-item">
            @if($user->sex == 0)
                <i class="fa fa-mars"></i>
            @else
                <i class="fa fa-venus"></i>
            @endif
            {{ $user->getSex() }}
        </li>
        @if ($user->phone)
        <li class="list-group-item">
            <i class="fa fa-mobile"></i>
            {{ $user->getPhone() }}
        </li>
        @endif
        @if ($user->birthday)
        <li class="list-group-item">
            <i class="fa fa-birthday-cake"></i>
            {{ $user->birthday->format('d.m.Y') }} - {{ $user->getAge() }}
        </li>
        @endif
        @if ($user->bio)
        <li class="list-group-item">
            <i class="fa fa-info-circle"></i>
            {{ $user->bio }}
        </li>
        @endif
    </ul>
</div>


<div class="panel panel-default">
    <div class="panel-heading">Des relations @if($my_profile) <a href="javascript:;" data-toggle="modal" data-target="#profileRelationship"><i>{{ 'New' }}</i></a> @endif</div>

    <ul class="list-group" style="max-height: 300px; overflow-x: auto">
        @if($relationship->count() == 0 && $relationship2->count() == 0)
            <li class="list-group-item">No Relationship!</li>
        @endif
        @if($relationship->count() > 0)
            @foreach($relationship as $relative)
                <li class="list-group-item">
                    @if($user->sex == 0){{ 'His' }}@else{{ 'Her' }}@endif {{ $relative->getType() }} is <a href="{{ url('/'.$relative->relative->username) }}">{{ $relative->relative->name }}</a>
                    @if($my_profile)
                    <a href="javascript:;" onclick="removeRelation(0, {{ $relative->id }})" class="pull-right"><i class="fa fa-times"></i></a>
                    @endif
                </li>
            @endforeach
        @endif
        @if($relationship2->count() > 0)
            @foreach($relationship2 as $relative)
                <li class="list-group-item">
                    {{ $relative->getType() }} of  <a href="{{ url('/'.$relative->main->username) }}">{{ $relative->main->name }}</a>
                    @if($my_profile)
                    <a href="javascript:;" onclick="removeRelation(1, {{ $relative->id }})" class="pull-right"><i class="fa fa-times"></i></a>
                    @endif
                </li>
            @endforeach
        @endif
    </ul>
</div>



<div class="panel panel-default">
    <div class="panel-heading">Loisirs @if($my_profile) <a href="javascript:;" data-toggle="modal" data-target="#profileHobbies"><i>{{ 'Edit' }}</i></a> @endif</div>

    <ul class="list-group" style="max-height: 300px; overflow-x: auto">
        @if($user->hobbies()->count() == 0)
            <li class="list-group-item">Pas de passe-temps!</li>
        @else
            @foreach($user->hobbies()->get() as $hobby)
                <li class="list-group-item">{{ $hobby->hobby->name }}</li>
            @endforeach
        @endif
    </ul>


</div>



@if($my_profile)
<div class="modal fade" id="profileInformation" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Vos informations</h5>
            </div>

            <div class="modal-body">
                <form id="form-profile-information">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sexe</label>
                                <select class="form-control " name="sex">
                                    <option value="0" @if($user->sex == 0){{ 'selected' }}@endif>masculin</option>
                                    <option value="1" @if($user->sex == 1){{ 'selected' }}@endif>feminin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Anniversaire</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-birthday-cake"></i></span>
                                    <input type="text" class="form-control datepicker" name="birthday" value="@if($user->birthday){{ $user->birthday->format('Y-m-d') }}@endif" aria-describedby="basic-addon1" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Téléphone:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-mobile"></i></span>
                                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Biographie</label>
                        <textarea name="bio" class="form-control">{{ $user->bio }}</textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="saveInformation()">sauvegarder</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="profileHobbies" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Vos hobbies</h5>
            </div>
            <form id="form-profile-hobbies" method="post" action="{{ url('/'.$user->username.'/save/hobbies') }}">

                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="form-group">
                        <label>Loisirs:</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select class="form-control select2-multiple" name="hobbies[]" multiple="multiple" style="width: 100%">
                                    @foreach($hobbies as $hobby)
                                        <option value="{{ $hobby->id }}" @if($user->hasHobby($hobby->id)){{ 'selected' }}@endif>{{ $hobby->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">sauvegarder</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="profileRelationship" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Nouvelle relation</h5>
            </div>
        </div>
    </div>
</div>

@endif