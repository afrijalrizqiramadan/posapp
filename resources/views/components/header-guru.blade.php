<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <nav
    class="container custom-container-mobile navbar navbar-expand-lg bg-primary shadow p-0 justify-content-center"
>
    <div class="container header-primary custom-container-mobile d-block" [class.header-detail]="!show" style="background-image: url('assets/img/bg-top.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="row mx-2 px-1 pt-3" style="height: 45px">
                <div class="col-1 p-0">
                    <i *ngIf="!home" class="fa fa-chevron-left fa-2x m-auto text-center text-white" style="cursor: pointer" (click)="back()" ></i>
                </div>
                <div class="col-10">
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row mx-2 mt-4 px-1 pb-0 mb-0">
                <div class="d-flex justify-content-between align-items-center mt-auto">
                    <div class="">
                        <div class="d-flex align-items-center">
                            <div class="div">
                                <div class="circle-logo d-flex justify-content-center">
                                    <img
                                        src="assets/img/logo-venturo.png"
                                        alt=""
                                        class="my-auto"
                                        width="34"
                                        height="33"
                                    />
                                </div>
                            </div>
                            <div class="ms-3">
                                <h2 class="text-white custom-title-nama">Rifan Hidayat</h2>
                                <h2 class="text-white custom-title-nis">3120510406</h2>
                                <h2 class="text-white custom-title-jabatan">Guru</h2>
                            </div>
                        </div>
                    </div>
                    <div class="btn btn-light text-primary px-2 py-1">
                        {{-- <i class="ri-wallet-line"></i> --}}
                        <div class="" [routerLink]="['/home']" (click)="activateHome($event)">
                            <div class="d-flex justify-content-center">
                              <i class="ri-wallet-fill fs-16"></i>
                            </div>
                            <p style="font-size: 10px;margin-bottom: 0rem !important;">Slip Gaji</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</nav>

</div>

@livewireStyles
<style>

.custom-container-mobile {
    max-width: 480px !important;
    align-items: center;
    padding: 4px 20px;
}

.header-primary {
    position: absolute;
    max-width: 480px;
    height: 159px;
    left: 0px;
    top: -4px;

    background: #405189;
    border-radius: 0px 0px 0px 45px;
}

.header-detail {
    height: 250px;
}

.custom-text-position {
    width: 100vw;
    max-width: 720px;
}

.circle-logo {
    width: 59px;
    height: 59px;
    background: #FFFFFF;
    border-radius: 29.5px;
}

.custom-circle-top-bg {
    box-sizing: border-box;

    position: absolute;
    width: 300px;
    height: 300px;
    left: -11rem;
    top: -10rem;

    border: 45px solid #FFFFFF;
    border-radius: 100%;
    opacity: .1;
}

.custom-circle-bottom-bg {
    box-sizing: border-box;

    position: absolute;
    width: 200px;
    height: 200px;
    left: 10rem;
    top: 2rem;

    border: 45px solid #FFFFFF;
    border-radius: 100%;
    opacity: .1;
}

.title-top {
    color: #fff;
    font-weight: 400;
    font-size: 14px;
    font-weight: 400;
}

.custom-title-nama {
    font-size: 26px;
    margin: 0px;
    font-weight: 600;
}
.custom-title-nis {
    font-size: 12px;
    margin: 0px;
}

.custom-title-jabatan {
    font-size: 12px;
    font-weight: 400;
}

</style>
@livewireStyles()