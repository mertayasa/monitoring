<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('password', 'Password', ['class' => 'mb-1']) !!}
        <div class="input-group mb-2 mr-sm-2">
            {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
            <div class="input-group-prepend" style="cursor: pointer" onclick="showPassword('password')">
              <div class="input-group-text py-2"><i class="fas fa-eye"></i></div>
            </div>
        </div>  
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('confirmPassword', 'Konfirmasi Password', ['class' => 'mb-1']) !!}
        <div class="input-group mb-2 mr-sm-2">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'confirmPassword']) !!}
            <div class="input-group-prepend" style="cursor: pointer" onclick="showPassword('confirmPassword')">
              <div class="input-group-text py-2"><i class="fas fa-eye"></i></div>
            </div>
        </div>  
    </div>
</div>