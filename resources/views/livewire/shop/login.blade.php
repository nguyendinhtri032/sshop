<div>
    <form action="" method="" wire:submit.prevent="postLogin">
        @csrf
        <label for="username">Username</label>
        <div class="form-group last mb-4">
          
          <input type="text" class="form-control" id="username" name="username" wire:model="username">
          @error('username')
          <span class="error" style="color: red">{{ $message }}</span>
      @enderror
        </div>
        <label for="password">Password</label>
        <div class="form-group last mb-4">
          <input type="password" class="form-control" id="password" name="password" wire:model="password">
          @error('password')
          <span class="error" style="color: red">{{ $message }}</span>
      @enderror
        </div>
        
        <div class="d-flex mb-5 align-items-center">
          <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
            <input type="checkbox" name="remember" value="1" wire:model="remember">
            <div class="control__indicator"></div>
          </label>
          <span class="ml-auto"><a href="register" class="forgot-pass">Create Account</a></span> 
          <span class="ml-auto"><a href="forget" class="forgot-pass">Forgot Password</a></span> 
          
        </div>
        <input type="submit" value="Log In" class="btn btn-block btn-primary">
        @error('field')
        <span class="error" style="color: red">{{ $message }}</span>
    @enderror
       </form>
</div>


