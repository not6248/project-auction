// $(document).ready(function () {
//     loadProducts(1);

//     $(".category-btn").click(function () {
//         $(".category-btn").removeClass("btn-primary").addClass("btn-light");
//         $(this).removeClass("btn-light").addClass("btn-primary");
//         let pro_typeID = $(this).data("pro-type");
//         console.log(pro_typeID);
//         loadProducts(pro_typeID);
//     });

//     function loadProducts(pro_typeID) {
//         $.ajax({
//             url: "./ajax/ajax_product_list.php", // Replace with your server-side script to fetch products
//             method: "GET",
//             data: { pd_type_id: pro_typeID },
//             success: function (data) {
//                 $("#product-list").html(data);
//             },
//             error: function (error) {
//                 console.error("Error loading products:", error);
//             }
//         });
//     }
// });



