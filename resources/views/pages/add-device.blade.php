@extends('../layout')
@section('style')
    <style>
        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
@endsection
@section('content')
    <div id="content">
        <div class="profile__container">
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="align-items-center mb-3 pt-3">
                    <h3 class="text-center mb-4">Thêm Thiết Bị</h3>
                </div>
                <form>
                    <div class="mb-3">
                        <label for="deviceName" class="form-label">Tên Thiết Bị</label>
                        <input type="text" class="form-control" id="deviceName" placeholder="Nhập tên thiết bị" required>
                    </div>
                    <div class="mb-3">
                        <label for="deviceType" class="form-label">Loại Thiết Bị</label>
                        <select class="form-select" id="deviceType" required>
                            <option selected disabled>Chọn loại thiết bị</option>
                            <option value="1">Thiết bị 1</option>
                            <option value="2">Thiết bị 2</option>
                            <option value="3">Thiết bị 3</option>
                            <option value="4">Thiết bị 4</option>
                            <option value="5">Thiết bị 5</option>
                            <option value="6">Thiết bị 6</option>
                            <option value="7">Thiết bị 7</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deviceSerial" class="form-label">Số Serial</label>
                        <input type="text" class="form-control" id="deviceSerial" placeholder="Nhập số serial" required>
                    </div>
                    <div class="mt-4 text-center pb-3">
                        <input class="btn btn-primary profile-button" type="submit" value="Thêm tiết bị">
                    </div>
                        
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const avatarInput = document.getElementById('avatar-input');
        const avatarPreview = document.getElementById('avatar-preview');
        const editAvatarBtn = document.getElementById('edit-avatar-btn');

        // Khi bấm vào nút "Sửa avatar"
        editAvatarBtn.addEventListener('click', () => {
            avatarInput.click(); // Kích hoạt input file
        });

        // Hiển thị ảnh ngay khi chọn
        avatarInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    avatarPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
