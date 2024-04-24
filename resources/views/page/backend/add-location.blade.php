@include("layouts.header")
<style>
    #imageNew {
        position: relative;
    }

    #cancelButton {
        position: absolute;
        top: 20px; /* ปรับตำแหน่งตามที่คุณต้องการ */
        right: 20px; /* ปรับตำแหน่งตามที่คุณต้องการ */
    }
</style>

@include("components.navbar")


<div class="content-wrapper">
    <div class="container-fluid" style="padding: 30px">         
    <form id='submit-form' action="{{ url("insert-location") }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="main-header">
                   <h5>
                        Master Management / บริหารรายการสถานที่ท่องเที่ยว
                        {{-- <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item"><a href="{{ url("master") }}">Master Management</a></li>
                            <li class="breadcrumb-item"><a href="#">บริหารรายการสถานที่ท่องเที่ยว</a></li>
                        </ol> --}}
                    </h5>
                </div>
                <div align="right">
                    <a class="btn btn-danger btn-sm" href="{{ url("manage-location") }}" role="button" title=""><i class="icofont icofont-ui-add"></i> ย้อนกลับ</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="padding: 30px">

                    <div class="form-group row">
                        <div id="LOCATION_NAME_BSF_AREA" class="col-md-2 " align="right">
                            <label for="LOCATION_NAME">ชื่อสถานที่ท่องเที่ยว</label>
                        </div>
                        <div id="LOCATION_NAME_BSF_AREA" class="col-md-8 wf-left">
                            <input type="text" name="LOCATION_NAME" id="LOCATION_NAME" class="form-control" value="">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <div id="LOCATION_DETAIL_BSF_AREA" class="col-md-2 " align="right">
                            <label for="LOCATION_DETAIL">รายละเอียด</label>
                        </div>
                        <div id="LOCATION_DETAIL_BSF_AREA" class="col-md-8 wf-left">
                            <textarea class="form-control" name="LOCATION_DETAIL" id="LOCATION_DETAIL" ></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <div id="LOCATION_PIC_BSF_AREA" class="col-md-2 " align="right">
                            <label for="LOCATION_PIC">รูปภาพ</label>
                        </div>
                        <div id="LOCATION_PIC_BSF_AREA" class="col-md-8 wf-left">
                            <input type="file" name="LOCATION_PIC" id="LOCATION_PIC" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div id="" class="col-md-2 " align="right">
                            <label for=""></label>
                        </div>
                        <div id="imageNew" hidden class="col-md-4 wf-left">
                            <img id="preview-image" src="" alt="" style="max-width: 100%; height: auto; margin-top: 10px;" class="img-fluid rounded">
                            <span id=""  style="display: block; margin-top: 5px;text-align:center;">(ภาพที่อัปโหลด)</span>
                            <a class="btn btn-danger btn-sm" style="float: right;width:31px;height:31px;" id="cancelButton" title="ยกเลิก"><b>x</b></a>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <br>
        <div class="col-sm-12" align="right">
            <button type="submit" class="btn btn-success btn-sm" id="submit_button" >บันทึก</button>
        </div>
    </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#LOCATION_PIC').change(function() {
            const fileInput = this;
            const imgPreview = $('#preview-image');
            const file = fileInput.files[0];

            var imgElement = $('#preview-image');
            var divElement = $('#imageNew');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgPreview.attr('src', e.target.result);
                    if (imgElement) {
                        divElement.removeAttr('hidden');
                    }
                };

                reader.readAsDataURL(file);
            } else {
                if (imgElement) {
                    divElement.attr('hidden', true);
                }
            }
        });

        $('#cancelButton').click(function() {
            var divElement = $('#imageNew');
            divElement.attr('hidden', true);
            $('#LOCATION_PIC').val("");
        });
    });
</script>

@include("layouts.footer")