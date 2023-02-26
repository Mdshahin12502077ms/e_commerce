$(document).ready(function(){
    $("#sel_cat").change(function(){
        var cat_id=$(this).find("option:selected").val();//cat_id-catch korar jonno
        console.log(cat_id);
        $.ajax({
          url:'Product_details/cat_ajax/'+cat_id,
          success:function(response){
            console.log(response);
            $('#sel_sub_cat').find('option').remove().end()
            $('#sel_sub_cat').append('<option>Select Sub Category</option>')
            for(var i=0; i<response.length; i++){
            $('#sel_sub_cat').append('<option value="'+response[i]['id']+'">'+response[i]['sub_catName']+'</option>')
            
              
            }
          }
        });
    })
    count=1;
    $("#add_more_weight").click(function() {
      console.log("yes");
      count=count+1;
      weight_div=' <label for="exampleInputUsername1">Add Weight '+count+'</label> <div class="d-flex"> <input type="text" class="form-control enable_tag" id="exampleInputUsername1" name ="weight[]" placeholder="Enter Product Weight (E.g, 3ML, 6ML)"/> </div>'
      
      price_div=' <label for="exampleInputUsername1">Add Price for Weight '+count+'</label><div class="d-flex"> <input type="text" class="form-control enable_tag" id="exampleInputUsername1" name ="price[]" placeholder="Enter Product Price (E.g, 3ML, 6ML)"/> </div>'
      $('.weight_div').append(weight_div)
      $('.weight_price_div').append(price_div)
    })
    $('.prod_sub').submit(function(e){
      e.preventDefault();//prevent reload issue
      formData=new FormData(this)
      //required for multile value
      var prod_weight=$("input[name='weight[]']").map(function(){return $(this).val();}).get().toString();
      var prod_price=$("input[name='price[]']").map(function(){return $(this).val();}).get().toString();
      formData.append('weight',prod_weight)
      formData.append('price',prod_price)

      $.ajax({
        url:"Product_details",
        type:"post",
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        },
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(response){
          console.log(response);
        },
      })
    })
    });