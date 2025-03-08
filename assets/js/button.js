// document.addEventListener("DOMContentLoaded", function () {
//   document.querySelectorAll(".see-more-btn").forEach((button) => {
//     let isExpanded = false; // กำหนด state เริ่มต้นเป็น false

//     button.addEventListener("click", function () {
//       const cardDetail =
//         this.closet(".card-body").querySelector(".container-detail");

//       isExpanded = !isExpanded;

//       // เปลี่ยนข้อความปุ่ม
//       if (isExpanded) {
//         this.textContent = "See Less";
//         cardDetail.style.maxHeight = cardDetail.scrollHeight + "px";
//         cardDetail.style.overflow = "auto";
//         cardDetail.style.whiteSpace = "nowrap";
//       } else {
//         this.textContent = "See More";
//         cardDetail.style.maxHeight = "60px";
//         cardDetail.style.overflowX = "hidden";
//       }
//     });
//   });
// });

// $(document).ready(function () {
//   $("#hideMe").click(function () {
//     $("p").hide();
//   });
// });
