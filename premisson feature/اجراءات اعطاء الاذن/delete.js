document.addEventListener("DOMContentLoaded", function() {
    var de1 = document.getElementById("de1");
    var de2 = document.getElementById("de2");
    
    de2.disabled = true; // تعطيل الزر الثاني عند تحميل الصفحة
    
    de1.addEventListener("click", function(event) {
        event.preventDefault();
        de2.disabled = !de2.disabled; // تبديل حالة تعطيل الزر الثاني عند النقر على الزر الأول
    });
});