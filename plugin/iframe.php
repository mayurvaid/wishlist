<script src="jquery.js"></script>
<script>



var url = (window.location != window.parent.location)
            ? document.referrer
            : document.location.href;
var melem = null;
window.onmessage = function(e) {

  melem = $(e.data);
  getItems();
};



function getItems(){
    var images = melem.find("img");
    var html = ''; 
    images.each(function(index) {
            var link = $(this).closest("a");
            var productname = $(this).attr("alt");

            var prod_img_src = $(this).attr('src');

            var link_src = link.attr("href");   

            if(productname && prod_img_src){
                debugger;
            var image_width = $(this).attr('gw_displaywidth');

             if(productname && link.length==0 && image_width>350){

                html +="<div style='width:520px; display: inline-block; border: 1px solid gray; overflow: hidden; margin:5px; padding:5px;'><img style='width:470' src='"+prod_img_src+"'/><br><b>title:</b>"+productname+"<br/><b>link:</b>"+link_src+"<br><br><b>Price:</b>"+price+"</div>";

            }

            else if(link.length!=0 && productname && link.attr("href").length>5 && image_width>100 &&  (link.attr("title") != productname)  ){
               // $("#gw_product_list").html()

               

               /* var elem = link.closest(".col");
                if(elem.length==0){
                     elem = link.closest("li");
                }
                */
                var price = "";//elem.text().split("₹")[1];


            //    var p1 = contains('div', 'sometext'); // find "div" that contain "sometext"

                html +="<div style='width:220px; display: inline-block; border: 1px solid gray; overflow: hidden; margin:5px; padding:5px;'><img style='width:170' src='"+prod_img_src+"'/><br><b>title:</b>"+productname+"<br/><b>link:</b>"+link_src+"<br><br><b>Price:</b>"+price+"</div>";
            }

        }

            $("#gw_product_list").html(html);
    })


}
</script>

<style>
.gw_modal {
    display: block; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    z-index:100000;
}

.gw_modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

.gw_close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.gw_close:hover,
.gw_close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.gw_modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.gw_modal-body {padding: 2px 16px;}

.gw_modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>
<div class='mgw_odal-header'>
      <span class='gw_close'>&times;</span>
      <h2>Gift-wrapper  Header</h2>
    </div>
    <div class='gw_modal-body' id='gw_product_list'>
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
    </div>
    <div class='gw_modal-footer'>
      <h3>Modal Footer</h3>

<img src="#" id="width_check" style="visibility:hidden">

    </div>


