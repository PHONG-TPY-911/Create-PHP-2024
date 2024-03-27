$(document).ready(function () {
    $('#provinceSelect').change(function () {
        var provinceId = $(this).val();
        console.log("Select ID : ",provinceId);
        $.ajax({
            url: 'get_districts.php',
            method: 'POST',
            data: {
                province_id: provinceId
            },
            success: function (data) {
                $('#districtSelect').html(data);
                console.log("Data", JSON.stringify(data));
            }
        });
    });

    $('#districtSelect').change(function () {
        var districtId = $(this).val();
        console.log("District ID : ",districtId);
        $.ajax({
            url: 'get_village.php',
            method: 'POST',
            data: {
                district_id: districtId
            },
            success: function (data) {
                $('#villageSelect').html(data);
                console.log("Data 1", JSON.stringify(data));
            }
        });
    });
});