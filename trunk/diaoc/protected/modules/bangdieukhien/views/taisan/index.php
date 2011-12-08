<div id="bang_dang_taisan" class="bangdieukhien_module">
    <div class="box_header">
        <h3>Đăng tài sản</h3>
    </div>
    <div class="box-content">
        <h4>Thông tin cơ bản</h4>

        <p><b>Điền chính xác các thông tin dưới đây giúp cho tài sản của bạn xuất hiện chính xác và đầy đủ trong các kết quả theo nhu cầu của người dùng, việc này giúp cho giao dịch của bạn sẽ nhanh hơn.</b></p>
        <div class="form_row clearfix">
            <div class="input_title">Loại tin rao:</div>
            <div class="input_content chonloaitin">
                <input type="radio" id="radio_loai_tin_rao_can_ban" value="B" name="loai_tin_rao" />
                <label for="radio_loai_tin_rao_can_ban">Cần bán</label>
                <input type="radio" id="radio_loai_tin_rao_can_mua" value="M" name="loai_tin_rao" />
                <label for="radio_loai_tin_rao_can_mua">Cần mua</label>
                <input type="radio" id="radio_loai_tin_rao_can_thue" value="T" name="loai_tin_rao" />
                <label for="radio_loai_tin_rao_can_thue">Cần thuê</label>
                <input type="radio" id="radio_loai_tin_rao_cho_thue" value="CT" name="loai_tin_rao" />
                <label for="radio_loai_tin_rao_cho_thue">Cho thuê</label>
            </div>
        </div>
        <div class="form_row clearfix">
            <div class="input_title">Loại địa ốc:<span class="required">*</span></div>
            <div class="input_content chonloaidiaoc">
                <div class="twocol clearfix">
                    <div class="tcleft">
                        <div class="customize">
                            <select name="loaidiaoc">
                                <option>Biệt thự</option>
                                <option>Nhà phố</option>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="tcright">
                        <div class="customize">
                            <select name="vitridiaoc">
                                <option>Mặt tiền</option>
                                <option>Mặt hẻm</option>
                                <option>Hẻm lớn</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="extra">&nbsp;</div>
        </div>
        <!--Tinh thanh pho-->
        <div class="form_row clearfix">
            <div class="input_title">Tỉnh / Thành phố:<span class="required">*</span></div>
            <div class="input_content chonloaidiaoc">
                <select name="vitridiaoc">
                    <option>Hồ Chí Minh</option>
                    <option>Hà Nội</option>
                    <option>Đà Nẵng</option>
                </select>

            </div>
        </div>

        <div class="form_row clearfix">
            <div class="input_title">Địa điểm: <span class="required">*</span></div>
            <div class="input_content chonloaidiaoc">
                <div class="twocol clearfix">
                    <div class="tcleft">
                        <div class="customize">
                            <select name="loaidiaoc">
                                <option>Vui lòng chọn Quận / Huyện</option>
                                <option>Nhà phố</option>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="tcright">
                        <div class="customize">
                            <select name="vitridiaoc">
                                <option>Vui lòng chọn Phường / Xã</option>
                                <option>Mặt hẻm</option>
                                <option>Hẻm lớn</option>
                            </select>
                        </div>
                    </div>
                </div>                

            </div>
            <div class="extra">Khác&nbsp;<input type="checkbox" /></div>
        </div>
        <div class="form_row clearfix">
            <div class="input_title">Địa chỉ: <span class="required">*</span></div>
            <div class="input_content chonloaidiaoc">
                <div class="twocol clearfix">
                    <div class="tcleft">
                        <div class="customize border_input">
                            <input type="text" style="border: none;"  value="Vui lòng nhập số nhà" />
                        </div>
                    </div>
                    <div class="tcright">
                        <div class="customize">
                            <select name="vitridiaoc">
                                <option>Vui lòng chọn Đường / Khu phố</option>
                                <option>Mặt hẻm</option>
                                <option>Hẻm lớn</option>
                            </select>
                        </div>
                    </div>
                </div>                

            </div>
            <div class="extra">Khác&nbsp;<input type="checkbox" /></div>
        </div>
        <!--Ten du an-->
        <div class="form_row clearfix">
            <div class="input_title">Tên dự án:</div>
            <div class="input_content">
                <select name="vitridiaoc">
                    <option>Green Sun Office</option>
                    <option>Hà Nội</option>
                    <option>Đà Nẵng</option>
                </select>

            </div>
            <div class="extra">Khác&nbsp;<input type="checkbox" /></div>
        </div>
        <!--Gia-->
        <div class="form_row clearfix">
            <div class="input_title">Giá:</div>
            <div class="input_content xacdinhgia">
                <div class="gia ctr">
                    <input type="text"  />
                </div>
                <div class="donvigia ctr">
                    <select name="donvigia">
                        <option>VND</option>
                        <option>USD</option>
                        <option>SJC</option>
                    </select>
                </div>
                <div class="tongdientich ctr">
                    <select name="tongdientich">
                        <option>Tổng diện tích</option>
                        <option>m2</option>
                        <option>Tháng</option>
                    </select>
                </div>
            </div>
        </div>
        <!--mAT TIEN-->
        <div class="form_row clearfix">
            <div class="input_title">Môi giới:</div>
            <div class="input_content chonloaitin">
                <input type="radio" id="mien_trung_gian_radio" value="MTG" name="loai_moi_gioi">
                <label for="mien_trung_gian_radio"><b>Miễn trung gian</b></label>
                <input type="radio" id="ky_goi_moi_gion" value="KGMG" name="loai_moi_gioi">
                <label for="ky_goi_moi_gion"><b>Ký gởi môi giới</b></label>
            </div>
        </div>
        <!--Diện tích sử dụng-->
        <div class="form_row clearfix">
            <div class="input_title">Diện tích sử dụng: <span class="required">*</span></div>
            <div class="input_content">
                <input type='text' style="width: 20%;" value="0" /><span>&nbsp;m2</span>
            </div>
        </div>
        <!--Diện tích khuôn viên-->
        <div class="form_row clearfix">
            <div class="input_title">Diện tích khuôn viên: <span class="required">*</span></div>
            <div class="input_content">
                <input type='text' style="width: 20%;" value="Chiều ngang" /><span>&nbsp;m&nbsp;<strong>X</strong>&nbsp;</span><input type='text' style="width: 20%;" value="Chiều rộng" /><span>&nbsp;m</span><input type="checkbox" id="dien_tich_khuon_vien_nohau" /><label for="dien_tich_khuon_vien_nohau"><b>Nở hậu</b></label>
            </div>
        </div>
        <!--Diện tích xây dựng-->
        <div class="form_row clearfix">
            <div class="input_title">Diện tích xây dựng: <span class="required">*</span></div>
            <div class="input_content">
                <input type='text' style="width: 20%;" value="Chiều ngang" /><span>&nbsp;m&nbsp;<strong>X</strong>&nbsp;</span><input type='text' style="width: 20%;" value="Chiều rộng" /><span>&nbsp;m</span><input type="checkbox" id="dien_tich_xay_dung_nohau" /><label for="dien_tich_xay_dung_nohau"><b>Nở hậu</b></label>
            </div>
        </div>

        <h4>Đặc điểm &amp; tiện ích</h4>
        <div id="dacdiem_dientich_panel" class="clearfix">
            <div class="one listofselect">
                <b>Tình trạng pháp lý:</b>
                <select name="tinh_trang_phap_ly">
                    <option>Vui lòng chọn...</option>
                </select>
                <b>Hướng tài sản:</b>
                <select name="huong_tai_san">
                    <option>Vui lòng chọn...</option>
                </select>
                <b>Đường trước nhà:</b>
                <select name="tinh_trang_phap_ly">
                    <option>Vui lòng chọn...</option>
                </select>
                <b>Số lầu:</b>
                <select name="duong_truoc_nha">
                    <option>Vui lòng chọn...</option>
                </select>
            </div>
            <div class="two listofselect">
                <b>Số phòng khách:</b>
                <select name="tinh_trang_phap_ly">
                    <option>Vui lòng chọn...</option>
                </select>
                <b>Số phòng ngủ:</b>
                <select name="tinh_trang_phap_ly">
                    <option>Vui lòng chọn...</option>
                </select>
                <b>Số phòng tắm/vệ sinh:</b>
                <select name="tinh_trang_phap_ly">
                    <option>Vui lòng chọn...</option>
                </select>
                <b>Số phòng khác:</b>
                <select name="tinh_trang_phap_ly">
                    <option>Vui lòng chọn...</option>
                </select>
            </div>
            <div class="three">
                <b>Các tiện ích:</b>
                <p><input type="checkbox" id="tien_ich_1" /><label for="tien_ich_1">Đầy đủ tiện nghi</label></p>
                <p><input type="checkbox" id="tien_ich_2" /><label for="tien_ich_2">Chỗ đậu xe hơi</label></p>
                <p><input type="checkbox" id="tien_ich_3" /><label for="tien_ich_3">Sân vườn</label></p>
                <p><input type="checkbox" id="tien_ich_4" /><label for="tien_ich_4">Hồ bơi</label></p>
                <p><input type="checkbox" id="tien_ich_5" /><label for="tien_ich_5">Tiện kinh doanh</label></p>
                <p><input type="checkbox" id="tien_ich_6" /><label for="tien_ich_6">Tiện để ở</label></p>
                <p><input type="checkbox" id="tien_ich_7" /><label for="tien_ich_7">Tiện làm văn phòng</label></p>
                <p><input type="checkbox" id="tien_ich_8" /><label for="tien_ich_8">Tiện cho sản xuất</label></p>
                <p><input type="checkbox" id="tien_ich_9" /><label for="tien_ich_9">Cho sinh viên thuê
                    </label></p>


            </div>
        </div>

        <h4>Mô tả chi tiết tài sản</h4>
        <p><b>Vùng nội dung mô tả này sẽ được kiểm duyệt thông tin trước khi cho phép hiển thị trên DiaOcXanhOnline.vn</b></p>
        <div id="bang_mota_chitiet" class="clearfix">
            <div class="form_row clearfix">
                <div class="input_title">Tiêu đề:<span class="required">*</span></div>
                <div class="input_content ">
                    <div class="customize border_input">
                        <input type="text" style="border: none;" value="Vui lòng nhập số nhà">
                    </div>
                </div>
                <div class="extra">&nbsp;</div>
            </div>  
            <div class="form_row clearfix">
                <div class="input_title">Nội dung mô tả:<span class="required">*</span></div>
                <div class="input_content ">

                    <div class="customize border_input">
                        <textarea style="width: 100%;border: none;height: 150px;"></textarea>
                    </div>
                </div>
                <div class="extra">&nbsp;</div>
            </div>      
        </div>

        <h4>Cập nhật hình ảnh</h4>
    </div>
</div>