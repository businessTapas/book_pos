<x-layout>
    @slot('title', )
    @slot('body')

    <div class="main-content">
        <div class="page-content">
          
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title text-capitalize">Create Customer By Central Store</h4>
                                </div>

                                <a class="btn btn-primary add-list btn-sm text-white"
                                href="{{route('central.customer')}}"><i class="las la-plus mr-3"></i>Back to
                                List</a>
                 
                            </div>

                            <div class="card-body">
                                <form id="form_data" action="{{route('central.add')}}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="" >Customer Group</label>
                                                <select   type="text" class="form-control"
                                                    placeholder="Enter  Customer Group " name="">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="first_name" class="required">First Name</label>
                                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                                                @error('first_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="last_name" class="required">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                                @error('last_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="company_name" >Company Name</label>
                                                <input type="text" name="company_name" class="form-control" placeholder="Company Name">
                                                @error('company_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="gst_no">Gst No</label>
                                                <input type="number" name="gst_no" class="form-control" placeholder="Enter your gst number">
                                                @error('gst_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
    
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="email" class="required">Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
    
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="phone" class="required">Phone No</label>
                                                <input type="number" name="phone" class="form-control" placeholder="Phone">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="alternative_phone" >Alternative Phone No</label>
                                                <input type="tel" name="alternative_phone" class="form-control" placeholder="Alternative Phone">
                                                @error('alternative_phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
    
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="required">Gender</label><br>
                                                <input type="radio" id="male" name="gender" value="Male">
                                                <label for="male">Male</label>
                                                <input type="radio" id="female" name="gender" value="Female">
                                                <label for="female">Female</label><br>
                                                @error('gender')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
    
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="dob" class="required">Date of Birth</label>
                                                <input type="date" name="dob" class="form-control" placeholder="Date of Birth">
                                                @error('dob')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                      

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="address" class="required">Address</label>
                                                <input type="text" name="address" class="form-control" placeholder="Enter your Address">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="district_id" class="required">District</label>
                                                <select id="district_id" required type="text" class="form-control selectpicker" data-live-search="true"
                                                    placeholder="Enter  District " name="district_id">
                                                    <option selected disabled> - Select District - </option>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}"><strong>{{ $district->name }}</strong> -
                                                            <span class="text-red">{{ $district->state }}</span> </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="city" class="required">city</label>
                                                <input type="text" name="city" class="form-control" placeholder="Enter your City name">
                                                @error('city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="state" class="required">State</label>
                                                <input type="text" name="state" class="form-control" placeholder="Enter your State Name">
                                                @error('state')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="pincode" class="required">Pincode</label>
                                                <input type="number" name="pincode" class="form-control limitedTxt" placeholder="Enter your Pincode">
                                                @error('pincode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="country" class="required">Country</label>
                                                <select id="country" required type="text" class="form-control selectpicker" data-live-search="true"
                                                    placeholder="Enter  Country " name="country">
                                                    <option selected disabled> - Select Country - </option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"><strong>{{ $country->name }}</strong> -
                                                            <span class="text-red">{{ $country->country }}</span> </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="col-sm-12 text-center">
                                            <button type="submit" class="btn btn-success btn-rounded"><i class="uil uil-check me-2"></i>Add Customer</button>
                                        </div>
                                    </div>
           
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                    <script src=""></script>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
     charLimit(6);
    });
    
    function charLimit(limit){
     
     $('.charLimit').text('(' + limit + '):');
     $('.charLeft').text(limit);
     
     //still working on getting mouse cut and paste working
     $('.limitedTxt').bind({
       copy : function(){
         console.log("copy");
       },
       paste : function(){
         console.log("paste");
         var charLen = this.value.length;
         var textVal = limit - charLen;
         console.log(charLen);
         console.log(textVal);
         if (charLen >= limit) {
           this.value = this.value.substring(0, limit);
         }
         if (textVal <= limit && textVal > 1){
         $('.charLeft').removeClass('charError').text(textLen);
         }
       },
       cut : function(){
         console.log("cut");
       }
     });
     
     $('.limitedTxt').keyup(function() {
       var charLen = this.value.length;
       var textLen = $('.charLeft').text(limit - charLen);
       var textVal = limit - charLen;
       if (charLen >= limit) {
         this.value = this.value.substring(0, limit);
       }
       if (textVal <= limit && textVal > 1){
         $('.charLeft').removeClass('charError').text(textLen);
       }else if(textVal <= 0){
         $('.charLeft').text('limit reached').addClass('charError');
       } 
     });
    }
    
       </script>
@endslot
</x-layout>