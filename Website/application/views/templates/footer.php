<footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p class="copyright"> &copy; 2017 Team 126P Geeked. seniordriver.tk All rights reserved &middot; <a href="<?php echo base_url() . 'index.php/AboutUs/index';?>">About Us</a></p>
      </footer>

    </div><!-- /.container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo asset_url(); ?>js/jquery.js"></script>
    <script src="<?php echo asset_url(); ?>js/jquery-ui.js"></script>
    <script>
    $(function() {
    $("#postcode").autocomplete({
        minLength:3, //minimum length of characters for type ahead to begin
        source: function (request, response) {
        $.ajax({
        type: 'POST',
        url: 'auspost', //your server side script
        dataType: 'json',
        data: {
        postcode: request.term
        },
        success: function (data) {
        //if multiple results are returned
        if(data.localities.locality instanceof Array)
        response ($.map(data.localities.locality, function (item) {
        return {
        label: item.location + ', ' + item.postcode,
        value: item.postcode
        //value: item.location + ', ' + item.postcode
        }
        }));
        //if a single result is returned
        else
        response ($.map(data.localities, function (item) {
        return {
        label: item.location + ', ' + item.postcode,
        value: item.postcode
        //value: item.location + ', ' + item.postcode
                }
            }));
            }
        });
        }
        });
    });
    </script>

    <script src="<?php echo asset_url(); ?>js/bootstrap-transition.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-alert.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-modal.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-dropdown.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-tab.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-tooltip.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-popover.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-button.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-collapse.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-carousel.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap-typeahead.js"></script>
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>

    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#itemCarousel').carousel()
        })
      }(window.jQuery)
    </script>

	
    <script src="<?php echo asset_url(); ?>/js/holder/holder.js"></script>

    <script language="JavaScript">

		function postcode_validate()
		{
            var userInput = document.getElementById('postcode').value;

    		var regPostcode = /^([3][0-9][0-9][0-9]|[8][0-9][0-9][0-9])$/;
    		if(userInput == ""){
    			//document.getElementById("errorField").innerHTML = "You haven't entered a postcode"
    			//document.getElementById("errorField").style.color = "red";
    			document.getElementById("postcode").value = '3000'
                return true;
    		}else if(regPostcode.test(userInput) == false)
    		{
    			document.getElementById("errorField").innerHTML = "Postcode is invalid. <br/>The Victoria postcode range is 3000—3999";
    			document.getElementById("errorField").style.color = "yellow";
    			return false;
    		}
    		else
    		{
                return true;
    		}
        }

    </script>

      <script language="JavaScript">

        function keyupFunction()
        {
            document.getElementById('errorField').innerHTML = "";

        }

    </script>


  </body>
</html>
