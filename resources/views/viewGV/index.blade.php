@include('view/adminleftgv')
@include('view/topcontengv')
<style type="text/css">
	/*descrip*/
.services-section {
  margin-top: 140px;
}
.services-section .section-heading h2 {
  color: #1e1e1e;
}
.services-section .service-item {
  background-color: #f7f7f7;
  border-radius: 5px;
  padding: 50px 40px;
  text-align: center;
  margin-bottom: 30px;
}
.services-page .service-item {
  margin-bottom: 30px;
}
.services-section .service-item i {
  color: #fff;
  background-color: #00bcd4;
  display: inline-block;
  width: 100px;
  height: 100px;
  line-height: 100px;
  text-align: center;
  border-radius: 50%;
  font-size: 32px;
}
.services-section .service-item h4 {
  margin-top: 35px;
  font-size: 19px;
  color: #1e1e1e;
  text-transform: capitalize;
  font-weight: 500;
  letter-spacing: 0.5px;
  margin-bottom: 30px;
}
.services-section {
  margin-top: 140px;
}
.services-section .section-heading h2 {
  color: #1e1e1e;
}
.services-section .service-item {
  background-color: #f7f7f7;
  border-radius: 5px;
  padding: 50px 40px;
  text-align: center;
  margin-bottom: 30px;
}
.services-page .service-item {
  margin-bottom: 30px;
}
.services-section .service-item i {
  color: #fff;
  background-color: #00bcd4;
  display: inline-block;
  width: 100px;
  height: 100px;
  line-height: 100px;
  text-align: center;
  border-radius: 50%;
  font-size: 32px;
}
.services-section .service-item h4 {
  margin-top: 35px;
  font-size: 19px;
  color: #1e1e1e;
  text-transform: capitalize;
  font-weight: 500;
  letter-spacing: 0.5px;
  margin-bottom: 30px;
}
.pricing-section {
  margin-top: 140px;
}
.background-image-pricing {
  background-image: url(../images/pricing-bg.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  min-height: 500px;
  position: absolute;
  width: 100%;
}
.pricing-section .section-heading {
  text-align: center;
  margin-top: 80px;
}
.pricing-section .section-heading h2,
.pricing-section .section-heading p {
  color: #fff;
}
.pricing-item {
  background-color: #fff;
  text-align: center;
  padding: 50px 50px 30px 50px;
  position: relative;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}
.pricing-item h4 {
  text-transform: uppercase;
  font-size: 17px;
  font-weight: 700;
  color: #1e1e1e;
  letter-spacing: 0.5px;
  margin-bottom: 45px;
}
.pricing-item .price-gradient {
  background: rgb(114,2,187);
    background: linear-gradient(145deg, rgba(114,2,187,1) 0%, rgba(50,100,245,1) 100%);
}
.pricing-item .price {
  background-color: #00bcd4;
  width: 100%;
  padding: 30px 0px;
  margin-bottom: 35px;
}
.pricing-item .price h6 {
  font-size: 32px;
  color: #fff;
  font-weight: 900;
  letter-spacing: 0.5px;
  margin-top: 0px;
  margin-bottom: 0px;
}
.pricing-item .price span {
  display: inline-block;
  color: #fff;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 700;
}
.pricing-item .dev {
  width: 100%;
  height: 1px;
  background-color: #eee;
  margin: 35px 0px 30px 0px;
}
.pricing-item ul {
  padding: 0;
  margin: 0;
  list-style: none;
  text-align: left;
}
.pricing-item ul li {
  display: inline-block;
  margin-bottom: 20px;
  font-size: 16px;
  color: #6a6a6a;
}
.pricing-item ul li i {
  font-size: 14px;
  margin-right: 8px;
  color: #491bb1;
}
.pricing-item ul li:last-child {
  margin-bottom: 40px;
}
.pricing-item a.main-button,
.pricing-item a.gradient-button {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  bottom: -25px;
}
@media (max-width: 767px) {
  .pricing-item  {
    margin-bottom: 55px;
  }
  .footer-item {
    margin-bottom: 60px;
  }
  footer .sub-footer {
    margin-top: 20px;
  }
}
.background-image-pricing {
  background-image: url(../img/pricing-bg.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  min-height: 500px;
  position: absolute;
  width: 100%;
}
a.main-button {
  outline: none;
  cursor: pointer;
  display: inline-block;
  height: 50px;
  line-height: 50px;
  padding: 0px 25px;
  border: none;
  margin-left: 10px;
  background-color: #00bcd4;
  color: #fff;
  text-transform: uppercase;
  font-size: 15px;
  font-weight: 500;
  letter-spacing: 0.5px;
  transition: all 0.5s;
}
a.main-button:hover {
  background-color: #00a4b9;
}
a.gradient-button {
  outline: none;
  cursor: pointer;
  display: inline-block;
  height: 50px;
  line-height: 50px;
  padding: 0px 25px;
  border: none;
  margin-left: 10px;
  background: rgb(114,2,187);
    background: linear-gradient(145deg, rgba(114,2,187,1) 0%, rgba(50,100,245,1) 100%);
  color: #fff;
  text-transform: uppercase;
  font-size: 15px;
  font-weight: 500;
  letter-spacing: 0.5px;
  transition: all 0.5s;
}
a.gradient-button:hover {
  background: rgb(114,2,187);
    background: linear-gradient(145deg, rgba(50,100,245,1) 0%, rgba(114,2,187,1) 100%);
}
</style>
<div class="services-section" style="margin-top: 4px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">

            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="service-item">
              <i class="fas fa-check-circle"></i>
              <h4>Đăng ký đồ án</h4>
              <p>Đăng nhập bằng tài khoản cá nhân sau đó tiến hành đăng ký đồ án</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="service-item">
             <i class="fas fa-chalkboard-teacher"></i>
              <h4>Chọn GVHD + Đề tài</h4>
              <p>Sau khi đăng ký đồ án tiến hành lựa chọn GVHD và đề tài đi kèm của GVHD đó thuộc nhiều lĩnh vực khác nhau</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="service-item">
             <i class="fas fa-file-upload"></i>
              <h4>Nộp sản phẩm tuần</h4>
              <p>Mỗi đồ án có 15 tuần để thực hiện, nộp sản phẩm tuần để đánh giá tiến độ thực hiện của đồ án đó</p>
            </div>
          </div>
           <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="service-item">
             <i class="far fa-calendar-alt"></i>
              <h4>Xem lịch báo cáo - gặp gỡ / trao đổi</h4>
              <p> </p>
            </div>
          </div>
           <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="service-item">
           <i class="fas fa-book-open"></i>
              <h4>Nhận tài liệu tham khảo</h4>
              <p>Sinh viên tham khảo các tài liệu liên quan đến đề tài</p>
            </div>
          </div>
           <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="service-item">
            <i class="fas fa-graduation-cap"></i>
              <h4>Đánh giá kết thúc đồ án</h4>
              <p>Sinh viên nộp toàn bộ sản phẩm của đề tài, xem đánh giá của GV</p>
            </div>
          </div>
        </div>
      </div>
    </div>  
@include('view/footergv')