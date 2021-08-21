<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel 8 Dynamic Dependent Dropdown using Jquery Ajax - XpertPhp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center">Laravel 8 Dynamic Dependent Dropdown using Jquery Ajax</h2>
    <div class="form-group">
      <label for="country">District:</label>
      <select name="district_id" id="district_id" class="form-control">
        <option value>Select One</option>
        @foreach ($districts as $district)
            <option value="{{ $district->id }}">{{ $district->name }}</option>
        @endforeach
        
    </select>
    </div>
    <div class="form-group">
      <label for="state">Thana:</label>
      <select name="thana_id" id="thana_id" class="form-control">
    </select>
    </div>
	<div class="form-group">
      <label for="city">Area:</label>
      <select name="area_id" id="area_id" class="form-control">
    </select>
    </div>
</div>
<script type=text/javascript>
        $('#district_id').change(function(){
        var districtID = $(this).val();
        if(districtID){
            $.ajax({
            type:"GET",
            url:"{{url('api/get-thana-list')}}/"+districtID,
            success:function(res){               
                if(res){
                    $("#thana_id").empty();
                    $("#thana_id").append('<option>Select Thana</option>');
                    $.each(res,function(key,value){
                        $("#thana_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
            
                }else{
                $("#thana_id").empty();
                }
            }
            });
        }else{
            $("#thana_id").empty();
            $("#area_id").empty();
        }      
    });
        $('#thana_id').on('change',function(){
        var thanaID = $(this).val();    
        if(thanaID){
            $.ajax({
            type:"GET",
            url:"{{url('api/get-area-list')}}/"+thanaID,
            success:function(res){               
                if(res){
                    $("#area_id").empty();
                    $("#area_id").append('<option>Select City</option>');
                    $.each(res,function(key,value){
                        $("#area_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
            
                }else{
                $("#area_id").empty();
                }
            }
            });
        }else{
            $("#area_id").empty();
        }
        
   });

</script>
</body>
</html>