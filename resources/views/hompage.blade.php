@extends('layouts.hompage')

@section('contentformanager')
<!-- Satış, şube ve müşteri sayısı -->
<section class="container mt-5">
    <div class="row hompage-info d-flex justify-content-center ">
        <!-- Satış Bilgileri -->
        <div class="col-md-3 hompage-info-item shadow">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img width="88px" height="88px" src="{{ asset('img/icons/growth.png') }}" alt="Toplam Satış">
                </div>
                <div class="col-md-8 text-center">
                    <h3 class="info-name">Toplam Satış</h3>
                    <span class="info-text">200</span>
                </div>
            </div>
            <div class="row hompage-info-footer">
                <a class="text-center " href="#"> <span>Satış bilgileri</span></a>
            </div>
        </div>
        <!-- Yapılan Ziyaret Sayısı -->
        <div class="col-md-3 hompage-info-item shadow">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img width="88px" height="88px" src="{{ asset('img/icons/map.png') }}" alt="Şube Ziyaretleri">
                </div>
                <div class="col-md-8 text-center">
                    <h3 class="info-name">Şube Ziyareti</h3>
                    <span class="info-text">300</span>
                </div>
            </div>
            <div class="row hompage-info-footer">
                <a class="text-center " href="#"> <span>Ziyaret Yönetimi</span></a>
            </div>
        </div>
        <!-- Müşteri Sayısı -->
        <div class="col-md-3 hompage-info-item shadow">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img width="88px" height="88px" src="{{ asset('img/icons/international-consumer.png') }}" alt="Müşteri Sayısı">
                </div>
                <div class="col-md-8 text-center ">
                    <h3 class="info-name">Müşteri Sayısı</h3>
                    <span class="info-text">200</span>
                </div>
            </div>
            <div class="row hompage-info-footer">
                <a class="text-center " href="#"> <span>Müşteri Yönetimi</span></a>
            </div>
        </div>
    </div>
</section>

<!-- Main -->
<section class="container-fluid transactions ">
  <!-- İşlemler -->
  <div class="container-fluid transactions-item">
    <div class="head">
      <span>İşlemler</span>
    </div>
    <div class="row tr-list shadow container-fluid d-flex justify-content-center">
      <!-- Satış Bilgileri -->
      <div class="col-md-3 tr-list-item shadow">
       <a style="text-decoration:none" href="#">
       <div class="row">
          <div class="col-md-4 text-center tr-list-item-image">
            <img width="68" height="68" src="{{ asset('img/icons/invoice.png' )}}" alt="Satış Bilgileri">
          </div>
          <div class="col-md-8 tr-list-item-name">
            <span>Satış Bilgileri</span>
          </div>
        </div>
       </a>
      </div>
      <!-- Şube Yönetimi -->
      <div class="col-md-3 tr-list-item shadow">
       <a style="text-decoration:none" href="{{ route('show.branchList') }}">
       <div class="row">
          <div class="col-md-4 text-center tr-list-item-image">
            <img width="68" height="68" src="{{ asset('img/icons/agency.png' )}}" alt="Şube Yönetimi">
          </div>
          <div class="col-md-8 tr-list-item-name">
            <span>Şube Yönetimi</span>
          </div>
        </div>
       </a>
      </div>
      <!-- Personeller -->
      <div class="col-md-3 tr-list-item shadow">
       <a style="text-decoration:none" href="{{ route('show.personnelList') }}">
       <div class="row">
          <div class="col-md-4 text-center tr-list-item-image">
            <img width="68" height="68" src="{{ asset('img/icons/teamwork.png' )}}" alt="Satış Bilgileri">
          </div>
          <div class="col-md-8 tr-list-item-name">
            <span>Personel Yönetimi</span>
          </div>
        </div>
       </a>
      </div>
      <!-- Müşteri Yönetimi -->
      <div class="col-md-3 tr-list-item shadow">
       <a style="text-decoration:none" href="{{ route('show.customer') }}">
       <div class="row">
          <div class="col-md-4 text-center tr-list-item-image">
            <img width="68" height="68" src="{{ asset('img/icons/kyc.png' )}}" alt="Satış Bilgileri">
          </div>
          <div class="col-md-8 tr-list-item-name">
            <span>Müşteri Yönetimi</span>
          </div>
        </div>
       </a>
      </div>
      <!-- Notlar -->
      <div class="col-md-3 tr-list-item shadow">
       <a style="text-decoration:none" href="#">
       <div class="row">
          <div class="col-md-4 text-center tr-list-item-image">
            <img width="68" height="68" src="{{ asset('img/icons/notes.png' )}}" alt="Notlar">
          </div>
          <div class="col-md-8 tr-list-item-name">
            <span>Notlar</span>
          </div>
        </div>
       </a>
      </div>
    </div>
  </div>
  <!-- Şube Ziyaretleri -->
  <div class="container-fluid transactions-item">
    <div class="head">
      <span>Ziyaretler</span>
    </div>
    <div class="row tr-list shadow container-fluid d-flex justify-content-center">
      <!-- Yapılacak Ziyaretler -->
      <div class="col-md-3 tr-list-item shadow">
       <a style="text-decoration:none" href="#">
       <div class="row">
          <div class="col-md-4 text-center tr-list-item-image">
            <img width="68" height="68" src="{{ asset('img/icons/visitor.png' )}}" alt="Yapılacak ziyaretler">
          </div>
          <div class="col-md-8 tr-list-item-name">
            <span>Aktif Ziyaretler</span>
          </div>
        </div>
       </a>
      </div>
      <!-- Yeni ziyaret planı -->
      <div class="col-md-3 tr-list-item shadow">
       <a style="text-decoration:none" href="#">
       <div class="row">
          <div class="col-md-4 text-center tr-list-item-image">
            <img width="68" height="68" src="{{ asset('img/icons/file.png' )}}" alt="Yeni ziyaret planı">
          </div>
          <div class="col-md-8 tr-list-item-name">
            <span>Yeni Ziyaret Planı</span>
          </div>
        </div>
       </a>
      </div>
      <!-- Geçmiş ziyaretler -->
      <div class="col-md-3 tr-list-item shadow">
       <a style="text-decoration:none" href="#">
       <div class="row">
          <div class="col-md-4 text-center tr-list-item-image">
            <img width="68" height="68" src="{{ asset('img/icons/long-lasting.png' )}}" alt="Geçmiş ziyaretler">
          </div>
          <div class="col-md-8 tr-list-item-name">
            <span>Geçmiş Ziyaretler</span>
          </div>
        </div>
       </a>
      </div>
     
    </div>
  </div>
</section>
@stop

@section('contentforstaff')
 <!-- Bildirim -->
<div class="container mt-4"> 
  <div class="alert alert-primary d-flex align-items-center" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  <div>
    Yeni bir ziyaret planınız var lütfen "Yapılacak Ziyaretler" kısmını kontrol edin!
  </div>
</div>
</div>
  <!-- Main -->
<section class="container-fluid transactions ">
  <!-- Şube Ziyaretleri -->
  <div class="container-fluid transactions-item">
    <div class="head">
      <span>Ziyaretler</span>
    </div>
    <div class="row tr-list shadow container-fluid d-flex justify-content-center">
      <!-- Yapılacak Ziyaretlerim -->
      <div class="col-md-3 tr-list-item shadow">
       <a style="text-decoration:none" href="#">
       <div class="row">
          <div class="col-md-4 text-center tr-list-item-image">
            <img width="68" height="68" src="{{ asset('img/icons/visitor.png' )}}" alt="Yapılacak ziyaretler">
          </div>
          <div class="col-md-8 tr-list-item-name">
            <span>Yapılacak Ziyaretler</span>
          </div>
        </div>
       </a>
      </div>
       <!-- geçmiş ziyaretler -->
      <div class="col-md-3 tr-list-item shadow">
       <a style="text-decoration:none" href="#">
       <div class="row">
          <div class="col-md-4 text-center tr-list-item-image">
            <img width="68" height="68" src="{{ asset('img/icons/history2.png' )}}" alt="Yapılacak ziyaretler">
          </div>
          <div class="col-md-8 tr-list-item-name">
            <span>Geçmiş Ziyaretlerim</span>
          </div>
        </div>
       </a>
      </div>
     
    </div>
  </div>
  <!-- İşlemler -->
  <div class="container-fluid transactions-item">
    <div class="head">
      <span>İşlemler</span>
    </div>
    <div class="row tr-list shadow container-fluid d-flex justify-content-center">
      <!-- Satış Bilgileri -->
      <div class="col-md-3 tr-list-item shadow">
       <a style="text-decoration:none" href="#">
       <div class="row">
          <div class="col-md-4 text-center tr-list-item-image">
            <img width="68" height="68" src="{{ asset('img/icons/add-file.png' )}}" alt="Satış Bilgileri">
          </div>
          <div class="col-md-8 tr-list-item-name">
            <span>Satış Bilgisi Ekle</span>
          </div>
        </div>
       </a>
      </div>
      <!-- Şube Yönetimi -->
      <div class="col-md-3 tr-list-item shadow">
       <a style="text-decoration:none" href="#">
       <div class="row">
          <div class="col-md-4 text-center tr-list-item-image">
            <img width="68" height="68" src="{{ asset('img/icons/notes.png' )}}" alt="Şube Yönetimi">
          </div>
          <div class="col-md-8 tr-list-item-name">
            <span>Notlar</span>
          </div>
        </div>
       </a>
      </div>
      <!-- Personeller -->
      <div class="col-md-3 tr-list-item shadow">
       <a style="text-decoration:none" href="#">
       <div class="row">
          <div class="col-md-4 text-center tr-list-item-image">
            <img width="68" height="68" src="{{ asset('img/icons/add(note).png' )}}" alt="Satış Bilgileri">
          </div>
          <div class="col-md-8 tr-list-item-name">
            <span>Yeni Not Oluştur</span>
          </div>
        </div>
       </a>
      </div>
    
    </div>
  </div>
  
</section>
@stop