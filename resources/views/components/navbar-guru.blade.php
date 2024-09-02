<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
    <nav class="container container-mobile navbar fixed-bottom navbar-light bg-light custom-bar-bottom">
        <div class="d-flex justify-content-between align-items-end m-auto mb-0">
            <div class="custom-item-menu">
                <div class="d-flex justify-content-center">
                    <i class="mdi mdi-home-outline fs-24"></i>
                </div>
                <p class="custom-text-menu">Home</p>
            </div>
    
            <div class="custom-item-menu">
                <div class="d-flex justify-content-center">
                    <i class="mdi mdi-chart-bar fs-24"></i>
                </div>
                <p class="custom-text-menu">Penilaian</p>
            </div>
    
            <div class="custom-item-menu">
                <div class="d-flex justify-content-center">
                    <i class="mdi mdi-account-circle-outline fs-24"></i>
                </div>
                <p class="custom-text-menu">Profile</p>
            </div>
        </div>
    </nav>
    
</div>

@livewireStyles
 <style>
    .custom-bar-bottom {
    background: #FAFAFA;
    box-shadow: 0px -5px 5px rgba(34, 34, 34, 0.03);
    border-radius: 18px 18px 0px 0px;
    height: 72px;
}

.custom-list-menu {
    display: flex;
    justify-content: center !important;
}

.custom-item-menu {
    justify-content: center;
    padding-left: 1.7rem !important;
    padding-right: 1.7rem !important;
    cursor: pointer;
    color: #878a99 !important;
}

.custom-text-menu {
    font-size: 12px;
    margin-bottom: 0rem !important;
    color: #878a99 !important
}

.custom-text-menu:hover, .custom-item-menu:hover, .custom-text-menu.active, .custom-item-menu.active{
    color: #405189 !important;
}

.custom-img-color {
    // background-color: #C6C6C6;
    // .img-active {
    //     background-color: #009AAD !important;
    // }

    filter: invert(67%) sepia(57%) saturate(6921%) hue-rotate(163deg) brightness(97%) contrast(101%);;
}

.custom-fixed-bottom {
    z-index: 100;
}

 </style>
@livewireStyles