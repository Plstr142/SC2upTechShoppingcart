// $(document).ready(function () {
//   $("#container-detail").on("mousedown", function (e) {
//     let startX = e.pageX;
//     let scrollLeftStart = $(this).scrollLeft();

//     $(this).on("mousemove", function (e) {
//       $(this).scrollLeft(scrollLeftStart - (e.pageX - startX));
//     });

//     $(this).on("mouseup", function () {
//       $(this).off("mousemove");
//     });
//   });
// });

// jquery
// $(document).ready(function () {
//   $("#see-more-btn").on("click", function () {
//     var container = $("#container-detail");
//     var maxScroll = container[0].scrollWidth - container.innerWidth();

//     container.animate(
//       {
//         scrollLeft: "+=100",
//       },
//       500,
//       function () {
//         if (container.scrollLeft() >= maxScroll) {
//           $("#see-more-btn").text("See Less");
//         } else {
//           $("#see-more-btn").text("See More");
//         }
//       }
//     );
//   });
// });

// $(document).ready(function () {
//   const isVisible = false; // ตัวแปร state เก็บสถานะการแสดงผล

//   $("#see-more-btn").on("click", function () {
//     const container = $("#container-detail");

//     if (!isVisible) {
//       // ถ้ายังไม่แสดง → แสดง container และ Scroll ไปทางขวา
//       container.slideDown(500, function () {
//         container.animate({ scrollLeft: "+=100" }, 500);
//       });
//       $("#see-more-btn").text("See Less");
//     } else {
//       // ถ้ากดอีกครั้ง → ซ่อน container
//       container.slideUp(500);
//       $("#see-more-btn").text("See More");
//     }

//     isVisible = !isVisible; // สลับค่าของ state
//   });
// });

$(document).ready(function () {
  var isVisible = false; // สถานะการแสดงผล

  $("#see-more-btn").on("click", function () {
    var container = $("#container-detail");

    if (!isVisible) {
      // ถ้ายังไม่แสดง → แสดง container และเปิด scroll
      container.show(500).addClass("scrollable"); // แสดงและเปิดการ scroll
      container.animate({ scrollLeft: "+=100" }, 500); // เลื่อน scroll ไปทางขวา
      $(this).text("See Less");
    } else {
      // ถ้าแสดงอยู่แล้ว → ซ่อน container และปิด scroll
      container.hide(500).removeClass("scrollable"); // ซ่อนและปิดการ scroll
      $(this).text("See More");
    }

    // สลับค่าของสถานะ
    isVisible = !isVisible;
  });
});

//js
// const rangeInputs = document.querySelectorAll(".form-range");

// rangeInputs.forEach(function (rangeInput) {
//   const productId = rangeInput.getAttribute("data-product-id");
//   const rangeValue = document.getElementById("rangeValue" + productId);

//   rangeValue.textContent = rangeInput.value;

//   rangeInput.addEventListener("input", function () {
//     rangeValue.textContent = rangeInput.value;
//   });

//   rangeInput.addEventListener("change", function () {
//     const quantity = rangeInput.value;

//     console.log("Product ID: ", productId, "Quantity: ", quantity);

//     const formData = new FormData();
//     formData.append("product_id", productId);
//     formData.append("quantity", quantity);

//     fetch("cart-add.php", {
//       method: "POST",
//       body: formData,
//     })
//       .then((response) => response.json())
//       .then((data) => {
//         console.log("Response from server:", data);
//       })
//       .catch((error) => {
//         console.error("Error:", error);
//       });
//   });
// });
