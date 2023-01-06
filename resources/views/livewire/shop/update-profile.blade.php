<div><div>
  {{--   <button class="btn btn-primary" onclick="openFormInfo()" id="btn-form-i" style="display: none" >Change Information</button>
    <button class="btn btn-primary" onclick="openFormPassword()" id="btn-form-p" >Change Password</button>
    --}}
    <form style="" id="myFormI" wire:submit.prevent="updateInfo">
        <!-- Form Group (username)-->
        <!-- Form Row-->
        <div class="row gx-3 mb-3">
            <!-- Form Group (first name)-->
            <div class="col-md-6">
                <label class="small mb-1" for="">Full name</label>
                <input class="form-control" id="" type="text"  wire:model="fullname" value="{{$user->fullname}}" placeholder="{{$user->fullname}}">
            </div>
            @error('fullname')
            <span class="error" style="color: red">{{ $message }}</span>
            @enderror

            <!-- Form Group (last name)-->
           
        </div>
        <!-- Form Row        -->
        <div class="row gx-3 mb-3">
            <!-- Form Group (organization name)-->
          
            <!-- Form Group (location)-->
            <div class="col-md-6">
                <label class="small mb-1" for="">Address</label>
                <input class="form-control" id="" type="text"  wire:model="address" value="{{$user->address}}" placeholder="{{$user->address}}">
            </div>
            @error('address')
            <span class="error" style="color: red">{{ $message }}</span>
        @enderror

        </div>
        <!-- Form Group (email address)-->
        <div class="row gx-3 mb-3">
            <!-- Form Group (organization name)-->
          
            <!-- Form Group (location)-->
           

        </div>
        <!-- Form Row-->
        <div class="row gx-3 mb-3">
            <!-- Form Group (phone number)-->
            <div class="col-md-6">
                <label class="small mb-1" for="">Phone number </label>
                <input class="form-control" id="" type="number"  wire:model="number_telephone" value="{{$user->number_telephone}}" placeholder="{{$user->number_telephone}}">
            </div>
            @error('number_telephone')
            <span class="error" style="color: red">{{ $message }}</span>
        @enderror

            <!-- Form Group (birthday)-->
        </div>
        <div class="row gx-3 mb-3">
            <!-- Form Group (phone number)-->
            <div class="col-md-6">
                <label class="small mb-1" for="">Birthday</label>
                <input class="form-control" id="" type="date" wire:model="birthday" value="{{$user->birthday}}" placeholder="{{$user->birthday}}">
            </div>
            @error('birthday')
            <span class="error" style="color: red">{{ $message }}</span>
        @enderror

            <!-- Form Group (birthday)-->
        </div>
        
      


        
        <!-- Save changes button-->
        <button class="btn btn-primary" type="submit">Save changes Information</button>
        @error('field1')
        <span class="error" style="color: red">{{ $message }}</span>
    @enderror
    </form>
</div>
<div>
    <form style="" id="myFormP" wire:submit.prevent="updatePassword">
        <!-- Form Group (username)-->
       
        <!-- Form Row-->
       
        <div class="row gx-3 mb-3">
            <!-- Form Group (first name)-->
            <div class="col-md-6">
                <label class="small mb-1" for="">Password {{$password}}</label>
                <input class="form-control" wire:model="password_confirmation" type="password"  >    
            </div>  @error('password_confirmation')
            <span class="error" style="color: red">{{ $message }}</span>
        @enderror
       
           

            <!-- Form Group (last name)-->
           
        </div> 
        <!-- Form Row        -->
        <div class="row gx-3 mb-3">
            <!-- Form Group (organization name)-->
          
            <!-- Form Group (location)-->
            <div class="col-md-6">
                <label class="small mb-1" for="">Confirm Password</label>
                <input class="form-control" id="" wire:model="password" type="password" >
            </div>
            @error('password')
            <span class="error" style="color: red">{{ $message }}</span>
        @enderror

        </div>

        
        <!-- Form Group (email address)-->
        <button class="btn btn-primary" type="submit">Save changes Password</button>
        @error('field2')
        <span class="error" style="color: red">{{ $message }}</span>
    @enderror
    </form>
</div>  




{{-- <script>
    function openFormPassword() {
  document.getElementById("myFormP").style.display = "block";
  
  document.getElementById("myFormI").style.display = "none";
  document.getElementById("btn-form-p").style.display = "none";
  
  document.getElementById("btn-form-i").style.display = "block";
  
}

function openFormInfo() {
  document.getElementById("myFormI").style.display = "block";
  
  document.getElementById("myFormP").style.display = "none";
  document.getElementById("btn-form-i").style.display = "none";
  
  document.getElementById("btn-form-p").style.display = "block";
  

} 
</script>  --}}</div>