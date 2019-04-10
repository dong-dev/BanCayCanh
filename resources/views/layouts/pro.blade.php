<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.metadata')
</head>

<body>
    @include('partials.header')

    @include('partials.pro_menu')
        @yield('content')
    @include('partials.footer')

    <!-- jQuery Plugins -->
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/slick.min.js') }}"></script>
    <script src="{{ url('js/nouislider.min.js') }}"></script>
    <script src="{{ url('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

          var productItem = $('.product-item');
          var curencyformat=function(value){
            return value + ' VNĐ';
          };
          var totalfn=function(){
            var tamTinh = $('tfoot .total');
            
            var sum=0;
            
            productItem.each(function(i,j){
              var sl=$(j).find('.input')[0].value;
              var price=$(j).find('[data-price]').data('price');
              sum+=price*sl;
            });
            $('tfoot .total').text(curencyformat(sum.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")));
            
            
            
            var tongTien = sum + 50000;
            document.getElementById("shipping").innerHTML = "50000";
            $('tfoot .sub-total').text(curencyformat(tongTien.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))); 
            
          }
          productItem.each(function () {
            var that = $(this);
            var donGia = parseInt(that.find('.price').data('price'));
            var input = that.find(".input");
            var thanhTien = that.find(".totalValue");
            //console.log(donGia);

            input.bind('keyup mouseup', function (){
              var sl = $(this).val();
              // console.log(parseInt(donGia)*sl);
              thanhTien.text(curencyformat(donGia*sl));
              totalfn();

            });
            

          });
          totalfn();
         
        });

    </script>

</body>
</html>