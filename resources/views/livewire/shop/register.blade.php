<div>
    <form action="register" method="post" wire:submit.prevent="store">
        @csrf<label for="username">Username</label>
        <div class="form-group last mb-4">

            <input type="text" class="form-control" id="username" wire:model="username">
            @error('username')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror

        </div>

        <label for="password">Password</label>
        <div class="form-group last mb-4">
            <input type="password" class="form-control" id="" wire:model="password_confirmation">
            @error('password_confirmation')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror
        </div>


        <label for="password">Confirm Password</label>
        <div class="form-group last mb-4">
            <input type="password" class="form-control" wire:model="password">
            @error('password')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror
        </div>


        <label for="">Full name</label>
        <div class="form-group last mb-4">
            <input type="text" class="form-control" id="" wire:model="fullname">
            @error('fullname')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <label for="">Email</label>
        <div class="form-group last mb-4">
            <input type="text" class="form-control" id="" wire:model="email">
            @error('email')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror
        </div>
        
        
     <br>

        <label for="">Number telephone</label>
        <div class="form-group last mb-4">
            <input type="text" class="form-control" id="" wire:model="number_telephone">
            @error('number_telephone')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror
        </div>

      
        <label for="">Address</label>
        <div class="form-group last mb-4">

            <input type="text" class="form-control" id="" name="address" wire:model="address">
            @error('address')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror
        </div>


        <label for="">Birthday</label>
        <div class="form-group last mb-4">
            <input type="date" class="form-control" id="" name="birthday" value="birthday"
                wire:model="birthday">
            @error('birthday')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex mb-5 align-items-center">
        <span class="ml-auto"><a href="login" class="forgot-pass">Login Now</a></span>
        </div>
        @error('field')
            <span class="error" style="color: red">{{ $message }}</span>
        @enderror
        <input type="submit" value="Register" class="btn btn-block btn-primary">
</div>
</form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
