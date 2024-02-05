var deleteModelBtn = document.getElementById("deleteModel");
var modal = document.getElementById("exampleModal");
var cancelButton = modal.querySelector(".btn-secondary");
var deleteButton = modal.querySelector(".btn-danger");

deleteModelBtn.addEventListener("click", function() {
  modal.style.display = "block";
});

cancelButton.addEventListener("click", function() {
  modal.style.display = "none";
});

deleteButton.addEventListener("click", function() {
  function deleteData(n_em) {
    // قم بإرسال طلب AJAX لحذف البيانات من قاعدة البيانات
    $.ajax({
        url: '/php/delete employee.php', // استبدل بمسار الملف الذي يقوم بعملية الحذف
        type: 'POST',
        data: { n_em: n_em }, // استبدل بمعرف البيانات التي ترغب في حذفها
        success: function(response) {
            // تنفيذ الإجراءات بعد حذف البيانات بنجاح
            console.log('تم حذف البيانات بنجاح');
        },
        error: function(xhr, status, error) {
            // التعامل مع أي أخطاء في عملية الحذف
            console.error('حدث خطأ أثناء حذف البيانات');
        }
    });
}
  deleteItem();
  modal.style.display = "none";
});