  $(document).ready(function(){
    
    //banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots:true,
        items:1,
        loop:true
        });

        //top sale owl-carousel
        $("#top-sale .owl-carousel").owlCarousel({
        
            loop:true,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        });



        //isotope filter
        var $grid=$(".grid").isotope({
            itemSelector:'.grid-item',
            layoutMode:'fitRows'
        })

        //filter items on button click
        $(".button-group").on("click","button",function(){
            var filterValue=$(this).attr('data-filter');
            $grid.isotope({filter:filterValue});

        });


           //new arrivals owl-carousel
           $("#new-arrivals .owl-carousel").owlCarousel({
        
            loop:true,
            nav:false,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        });


        //blogs owl carousel
        $("#blog .owl-carousel").owlCarousel({
            loop:true,
            nav:false,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                }
            }
            
        })


        //product quantity section
        let $qty_up = $(".qty .qty-up");
        let $qty_down = $(".qty .qty-down");
        let $deal_price = $("#deal-price");

        //let $input = $(".qty .qty-input");
        


        // click on quantity button up
        $qty_up.click(function(e){

            let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
            let $price = $(`.product_price[data-id='${$(this).data("id")}']`);


            //change product price using ajax call
            $.ajax({ url: "NewTemplate/ajax.php", type:'post',data:{itemid: $(this).data("id")} , success : function (result){
                let obj = JSON.parse(result);
                let item_price = obj[0]['item_price'];

                    if($input.val() >=1 && $input.val() <=10){
                        $input.val(function(i,oldval){
                            return ++oldval;
                        });
                        //increases the price of the product.
                        $price.text(parseInt(item_price * $input.val()).toFixed(2));

                        //set subtotal price
                        let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
                        $deal_price.text(subtotal.toFixed(2));
                    }


                }}); // close the ajax request.


        });

        //click on quantity button down

        $qty_down.click(function(e){
            let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
            let $price = $(`.product_price[data-id='${$(this).data("id")}']`);
            //change product price using ajax call
            $.ajax({ url: "NewTemplate/ajax.php", type:'post',data:{itemid: $(this).data("id")} , success : function (result){
                    let obj = JSON.parse(result);
                    let item_price = obj[0]['item_price'];

                    if($input.val() >1 && $input.val() <=10){
                        $input.val(function(i,oldval){
                            return --oldval;


                        });
                        //increases the price of the product.
                        $price.text(parseInt(item_price * $input.val()).toFixed(2));

                        //set subtotal price
                        let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
                        $deal_price.text(subtotal.toFixed(2));
                    }


                }}); // close the ajax request.



        });


});