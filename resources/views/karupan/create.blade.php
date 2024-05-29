
@extends('layoutmenu')

@section('title')
    เพิ่มรายการครุภัณฑ์
@endsection

@section('contentitle')
    เพิ่มข้อมูล
@endsection

@section('conten')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12">
            <form name="karupanForm" action="insert" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Create New</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body"> --}}
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <strong>คำนำหน้า</strong>
                                        <select class="form-select" aria-label="Select asset prefix" name="asset_prefix" id="asset_prefix" onchange="checkOtherPrefix()">
                                            <option selected disabled hidden>กรุณาเลือก</option>
                                            <option value="คพ.">คพ.</option>
                                            <option value="other">อื่นๆ</option>
                                        </select>
                                        <input type="text" name="other_asset_prefix" id="other_asset_prefix" placeholder="กรุณากรอกคำนำหน้า" style="display:none; margin-top:10px;" />
                                    </div>
                                    <div class="col-md-6">
                                        <strong>หมายเลขครุภัณฑ์</strong>
                                        <input type="text" name="asset_number" id="asset_number" class="form-control" placeholder="หมายเลขครุภัณฑ์">
                                        <div id="assetNumberError" style="color: red; display: none;">หมายเลขครุภัณฑ์ต้องประกอบด้วย 13 หลัก</div>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>ชื่อครุภัณฑ์</strong>
                                        <input type="text" name="asset_name" class="form-control"
                                            placeholder="ชื่อครุภัณฑ์">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>ราคาต่อหน่วย</strong>
                                        <input type="text" name="asset_price" class="form-control"
                                            placeholder="ราคาต่อหน่วย">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>จำนวน</strong>
                                        <input type="text" name="asset_amount" class="form-control"
                                            placeholder="จำนวน">
                                    </div>
                                    <div class="col-md-6">
                                        <strong>สถานะ</strong>
                                        <input type="text" name="asset_asset_status_id" class="form-control"
                                            placeholder="สถานะ">
                                    </div>
                                    <div class="col-md-6">
                                        <strong>แผนงาน</strong>
                                        <input type="text" name="asset_plan" class="form-control"
                                            placeholder="แผนงาน">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>โครงการ</strong>
                                        <input type="text" name="asset_project" class="form-control"
                                            placeholder="โครงการ">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>กิจกรรม</strong>
                                        <input type="text" name="asset_activity" class="form-control"
                                            placeholder="กิจกรรม">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>แหล่งเงิน</strong>
                                        <input type="text" name="asset_budget" class="form-control"
                                            placeholder="แหล่งเงิน">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>กองทุน</strong>
                                        <input type="text" name="asset_fund" class="form-control"
                                            placeholder="กองทุน">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>หน่วยงานย่อย</strong>
                                        <input type="text" name="asset_major" class="form-control"
                                            placeholder="หน่วยงานย่อย">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>สถานที่ตั้ง</strong>
                                        <select class="form-select" aria-label="Select asset reception type" name="asset_location">
                                            <option selected disabled hidden>กรุณาเลือกสถานที่</option>
                                            <option value="1">SC01</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>ประเภทการรับ</strong>
                                        <select class="form-select" aria-label="Select asset reception type" name="asset_reception_type">
                                            <option selected disabled hidden>กรุณาเลือกประเภทการรับ</option>
                                            <option value="1">เอกสารรับทรัพย์สินอื่นๆ</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>ค่าเสื่อมราคาสะสม</strong>
                                        <input type="text" name="asset_deteriorated_total" class="form-control"
                                            placeholder="ค่าเสื่อมราคาสะสม">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>ราคาซาก</strong>
                                        <input type="text" name="asset_scrap_price" class="form-control"
                                            placeholder="ราคาซาก">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>บัญชีค่าเสื่อมราคา</strong>
                                        <input type="text" name="asset_deteriorated_account" class="form-control"
                                            placeholder="บัญชีค่าเสื่อมราคา">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>ค่าเสื่อม</strong>
                                        <input type="text" name="asset_deteriorated" class="form-control"
                                            placeholder="ค่าเสื่อม">

                                    </div>
                      
                                    <div class="col-md-6">
                                        <strong>วันที่เริ่มต้นการคำนวณค่าเสื่อมราคา</strong>
                                        <input type="date" name="asset_deteriorated_at"  placeholder="5555" id="asset_deteriorated_at" class="form-control date-input" onchange="formatDateForDeterioratedAt(this)">
                                    </div>                              
                                    <div class="col-md-6">
                                        <strong>วันที่หยุดการคำนวณค่าเสื่อมราคา</strong>
                                        <input type="date" name="asset_deteriorated_stop" id="asset_deteriorated_stop" class="form-control date-input" onchange="formatDateForDeterioratedStop(this)">
                                    </div>
                                    <div class="col-md-6">
                                        <strong>วันที่สิ้นสุดการคำนวณค่าเสื่อมราคา</strong>
                                        <input type="date" name="asset_deteriorated_end" id="asset_deteriorated_end" class="form-control date-input" onchange="formatDateForDeterioratedEnd(this)">
                                    </div>

                                    <div class="col-md-6">
                                        <strong>ที่มาของทรัพย์สิน</strong>
                                        <input type="text" name="asset_get" class="form-control"
                                            placeholder="ที่มาของทรัพย์สิน">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>เลขที่เอกสาร</strong>
                                        <input type="text" name="asset_document_number" class="form-control"
                                            placeholder="เลขที่เอกสาร">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>หน่วยนับ</strong>
                                        <input type="text" name="asset_countingunit" class="form-control"
                                            placeholder="หน่วยนับ">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>ค่าเสื่อมราคายกมา</strong>
                                        <input type="text" name="asset_deteriorated_price" class="form-control"
                                            placeholder="ค่าเสื่อมราคายกมา">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>ราคาตามบัญชี</strong>
                                        <input type="text" name="asset_price_account" class="form-control"
                                            placeholder="ราคาตามบัญชี">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>บัญชีทรัพย์สินถาวร</strong>
                                        <input type="text" name="asset_account" class="form-control"
                                            placeholder="บัญชีทรัพย์สินถาวร">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>บัญชีค่าเสื่อมราคาสะสม</strong>
                                        <input type="text" name="asset_deteriorated_total_account" class="form-control"
                                            placeholder="บัญชีค่าเสื่อมราคาสะสม">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>อายุการใช้งาน(ปี)</strong>
                                        <input type="text" name="asset_live" class="form-control"
                                            placeholder="อายุการใช้งาน">

                                    </div>
                                    <div class="col-md-6">
                                        <strong>วันที่เริ่ม</strong>
                                        <input type="date" name="asset_regis_at" class="form-control"
                                            >

                                    </div>
                                    <div class="col-md-6">
                                        <strong>วันที่สิ้นสุด</strong>
                                        <input type="date" name="asset_created_at" class="form-control"
                                            >

                                    </div>
                                    <div class="col-md-6">
                                        <strong>หมายเหตุ</strong>
                                        <input type="text" name="asset_comment" class="form-control"
                                            placeholder="หมายเหตุ">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="mt-3 btn btn-success" style="float:right;">บันทึก</button>
                                </div>
                            
                                
                            {{-- </div> --}}
                        {{-- </div> --}}
                    {{-- </div> --}}
                {{-- </div> --}}
            </form>
        </div>
    </div>
</div>
<script>
    function checkOtherPrefix() {
        var selectBox = document.getElementById("asset_prefix"); // เลือกช่องเลือกคำนำหน้า
        var otherInput = document.getElementById("other_asset_prefix"); // เลือกช่องให้กรอกคำนำหน้าเอง
        if (selectBox.value === "other") { // ถ้าผู้ใช้เลือก "อื่นๆ"
            otherInput.style.display = "block"; // แสดงช่องให้กรอกคำนำหน้าเอง
        } else {
            otherInput.style.display = "none"; // ซ่อนช่องให้กรอกคำนำหน้าเอง
        }
    }
</script>
<script>
    document.getElementById('asset_number').addEventListener('input', function() {
        var assetNumber = this.value;
        var assetNumberError = document.getElementById('assetNumberError');
        if (assetNumber.length !== 13) {
            assetNumberError.style.display = 'block';
        } else {
            assetNumberError.style.display = 'none';
        }
    });
</script>
<script>
    // ตรวจสอบการกรอกข้อมูลเมื่อผู้ใช้กำลังพิมพ์
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('input', function() {
            if (!this.value.trim()) {
                this.classList.add('is-invalid');
                this.nextElementSibling.innerText = 'โปรดกรอกข้อมูลในฟิลด์นี้';
            } else {
                this.classList.remove('is-invalid');
                this.nextElementSibling.innerText = '';
            }
        });
    });

    // ตรวจสอบการส่งฟอร์มเมื่อผู้ใช้กด submit
    document.querySelector('form').addEventListener('submit', function(event) {
        const invalidInputs = this.querySelectorAll('.form-control.is-invalid');

        if (invalidInputs.length > 0) {
            event.preventDefault(); // ยกเลิกการส่งฟอร์มเมื่อมีข้อมูลไม่ถูกต้อง
            alert('โปรดกรอกข้อมูลให้ครบถ้วนและถูกต้อง');
        }
    });
</script>
@endsection

