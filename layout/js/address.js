document.addEventListener('DOMContentLoaded', function() {
    var districtData = {
        "Ben Tre": {
            "Thạnh Phú": ["Thanh Phong", "Thanh Lộc"],
            "Mỏ Cày": ["Mỏ Cày Bắc", "Mỏ Cày Nam"]
        },
        "Ho Chi Minh": {
            "Quận 1": ["Bến Nghé", "Cầu Ông Lãnh"],
            "Quận 2": ["Thảo Điền", "An Phú"],
            "Quận 3": ["Phường 1", "Phường 2", "Phường 3"],
            "Quận 4": ["Phường 4", "Phường 5", "Phường 6"],
            "Quận 5": ["Phường 7", "Phường 8", "Phường 9"],
            "Quận 6": ["Phường 10", "Phường 11", "Phường 12"],
            "Quận 7": ["Phường 13", "Phường 14", "Phường 15"],
            "Quận 8": ["Phường 16", "Phường 17", "Phường 18"],
            "Quận 9": ["Phường 19", "Phường 20", "Phường 21"],
            "Quận 10": ["Phường 22", "Phường 23", "Phường 24"],
            "Quận 11": ["Phường 25", "Phường 26", "Phường 27"],
            "Quận 12": ["Phường Tân Chánh Hiệp", "Phường Tân Thới Hiệp", "Phường Hiệp Thành"],
        }
    };

    var provinceSelect = document.getElementById('provinceSelect');
    var districtSelect = document.getElementById('districtSelect');
    var wardSelect = document.getElementById('wardSelect');

    provinceSelect.addEventListener('change', function() {
        var selectedProvince = this.value;
        
        // Xóa tất cả các options trong dropdown quận/huyện và phường/xã
        districtSelect.innerHTML = '<option value="">Chọn Quận / Huyện</option>';
        wardSelect.innerHTML = '<option value="">Chọn Phường / Xã</option>';

        // Thực hiện logic để thêm options tương ứng cho quận/huyện
        if (selectedProvince in districtData) {
            var districts = Object.keys(districtData[selectedProvince]);
            for (var i = 0; i < districts.length; i++) {
                districtSelect.innerHTML += '<option value="' + districts[i] + '">' + districts[i] + '</option>';
            }
        }
    });

    districtSelect.addEventListener('change', function() {
        var selectedDistrict = this.value;
        var selectedProvince = provinceSelect.value;

        // Xóa tất cả các options trong dropdown phường/xã
        wardSelect.innerHTML = '<option value="">Chọn Phường / Xã</option>';

        // Thực hiện logic để thêm options tương ứng cho phường/xã
        if (selectedProvince in districtData && selectedDistrict in districtData[selectedProvince]) {
            var wards = districtData[selectedProvince][selectedDistrict];
            for (var i = 0; i < wards.length; i++) {
                wardSelect.innerHTML += '<option value="' + wards[i] + '">' + wards[i] + '</option>';
            }
        }
    });
});
