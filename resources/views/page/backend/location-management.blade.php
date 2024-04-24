@include("layouts.header")

@include("components.navbar")

<style>
/* ปรับขนาดของลูกศร Pagination */
.pagination li span,
.pagination li a {
    font-size: 14px; /* ปรับขนาดตามที่ต้องการ */
}

</style>
<div class="content-wrapper">
    <div class="container-fluid" style="padding: 30px">         
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
                    <a class="btn btn-success btn-sm" href="{{ url("add-location") }}" role="button" title=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
</svg> เพิ่มข้อมูล</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="padding: 30px">
                
                    <!-- เพิ่มฟอร์มเลือกจำนวนรายการต่อหน้า -->
                    <form action="{{ url('manage-location') }}" method="GET">
                        <label for="per_page">แสดงรายการต่อหน้า:</label>
                        <select name="per_page" id="per_page" onchange="this.form.submit()">
                            <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                            <!-- เพิ่มตัวเลือกตามความต้องการ -->
                        </select>
                    </form>

                    <table class="table table-bordered">
                    <thead >
                        <tr class="table-info">
                            <th style="text-align:center;" width="5%">ลำดับ</th>
                            <th style="text-align:center;" width="15%">ชื่อสถานที่</th>
                            <th style="text-align:center;" width="35%">รายละเอียด</th>
                            <th style="text-align:center;" width="15%">รูปภาพ</th>
                            <th style="text-align:center;" width="15%">วันที่สร้าง</th>
                            <th style="text-align:center;" width="15%">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($rec_location as $index => $item)
                        <tr>
                            <td style="text-align:center;">{{ $index+1 }}</td>
                            <td style="text-align:left;">{{ $item->title }}</td>
                            <td style="text-align:left;">{{ mb_substr($item->detail, 0, 1500) }}</td>
                            <td style="text-align:left;"><img src="{{ url("uploads/".$item->main_pic) }}" class="img-fluid rounded" alt="..." width="150px"></td>
                            <td style="text-align:left;">{{ $item->create_date }}</td>
                            <td style="text-align:left;">
                                <a class="btn btn-warning btn-sm" href="{{ url("edit-location",['id'=>$item->t_id]) }}" role="button" title=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
</svg> แก้ไข</a>
                                <a class="btn btn-danger btn-sm" href="{{ url("delete-location",['id'=>$item->t_id]) }}" role="button" title="" onclick="return confirm('คุณต้องการลบรายการนี้หรือไม่?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg> ลบ</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <!-- แสดง Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $rec_location->links('pagination::bootstrap-4') }} <!-- ใช้ Bootstrap 4 Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include("layouts.footer")