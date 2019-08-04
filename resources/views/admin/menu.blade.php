<div class="sidebar" id="sidebar">

    <div class="menu menu__col">
        <ul class="menu-col">
            <li class="elm-active">
                <span class="icon-home">
                </span>
                <a href="{{route('index-admin')}}" >
                    Trang home
                </a>
            </li>
            <li class="menu-drop">
                <span>
                    <svg viewBox="0 0 128 128" id="icon-example" width="100%" height="100%">
                        <path d="M96.258 57.462h31.421C124.794 27.323 100.426 2.956 70.287.07v31.422a32.856 32.856 0 0 1 25.971 25.97zm-38.796-25.97V.07C27.323 2.956 2.956 27.323.07 57.462h31.422a32.856 32.856 0 0 1 25.97-25.97zm12.825 64.766v31.421c30.46-2.885 54.507-27.253 57.713-57.712H96.579c-2.886 13.466-13.146 23.726-26.292 26.291zM31.492 70.287H.07c2.886 30.46 27.253 54.507 57.713 57.713V96.579c-13.466-2.886-23.726-13.146-26.291-26.292z"></path>
                    </svg>
                </span>
                <a href="{{route('showType')}}">
                    Loại sản phẩm
                </a>
                <ul class="menu-drop-col">
                    <li><a href="{{route('showType')}}">Danh sách loại sản phẩm</a></li>
                    <li><a href="{{route('createPage')}}">Thêm loại mới</a></li>
                </ul>
            </li>            
            <li class="menu-drop">
                <span>
                    <svg viewBox="0 0 128 128" id="icon-example" width="100%" height="100%">
                        <path d="M96.258 57.462h31.421C124.794 27.323 100.426 2.956 70.287.07v31.422a32.856 32.856 0 0 1 25.971 25.97zm-38.796-25.97V.07C27.323 2.956 2.956 27.323.07 57.462h31.422a32.856 32.856 0 0 1 25.97-25.97zm12.825 64.766v31.421c30.46-2.885 54.507-27.253 57.713-57.712H96.579c-2.886 13.466-13.146 23.726-26.292 26.291zM31.492 70.287H.07c2.886 30.46 27.253 54.507 57.713 57.713V96.579c-13.466-2.886-23.726-13.146-26.291-26.292z"></path>
                    </svg>
                </span>
                <a href="{{route("showProduct")}}">
                    Sản phẩm
                </a>
                <ul class="menu-drop-col">
                    <li><a href="{{route("showProduct")}}">Danh sách sản phẩm</a></li>
                    <li><a href="{{route('newProduct')}}">Thêm sản phẩm</a></li>
                </ul>
            </li>
            <li>
                <span>
                    <svg viewBox="0 0 128 128" id="icon-example" width="100%" height="100%">
                        <path d="M96.258 57.462h31.421C124.794 27.323 100.426 2.956 70.287.07v31.422a32.856 32.856 0 0 1 25.971 25.97zm-38.796-25.97V.07C27.323 2.956 2.956 27.323.07 57.462h31.422a32.856 32.856 0 0 1 25.97-25.97zm12.825 64.766v31.421c30.46-2.885 54.507-27.253 57.713-57.712H96.579c-2.886 13.466-13.146 23.726-26.292 26.291zM31.492 70.287H.07c2.886 30.46 27.253 54.507 57.713 57.713V96.579c-13.466-2.886-23.726-13.146-26.291-26.292z"></path>
                    </svg>
                </span>
                <a href="{{route("showSlide")}}">
                    Slide
                </a>
            </li>
            <li>
                <span>
                    <svg viewBox="0 0 128 128" id="icon-example" width="100%" height="100%">
                        <path d="M96.258 57.462h31.421C124.794 27.323 100.426 2.956 70.287.07v31.422a32.856 32.856 0 0 1 25.971 25.97zm-38.796-25.97V.07C27.323 2.956 2.956 27.323.07 57.462h31.422a32.856 32.856 0 0 1 25.97-25.97zm12.825 64.766v31.421c30.46-2.885 54.507-27.253 57.713-57.712H96.579c-2.886 13.466-13.146 23.726-26.292 26.291zM31.492 70.287H.07c2.886 30.46 27.253 54.507 57.713 57.713V96.579c-13.466-2.886-23.726-13.146-26.291-26.292z"></path>
                    </svg>
                </span>
                <a href="{{route("showNews")}}">
                    Tin tức
                </a>
            </li>
            <li>
                <span>
                    <svg viewBox="0 0 128 128" id="icon-example" width="100%" height="100%">
                        <path d="M96.258 57.462h31.421C124.794 27.323 100.426 2.956 70.287.07v31.422a32.856 32.856 0 0 1 25.971 25.97zm-38.796-25.97V.07C27.323 2.956 2.956 27.323.07 57.462h31.422a32.856 32.856 0 0 1 25.97-25.97zm12.825 64.766v31.421c30.46-2.885 54.507-27.253 57.713-57.712H96.579c-2.886 13.466-13.146 23.726-26.292 26.291zM31.492 70.287H.07c2.886 30.46 27.253 54.507 57.713 57.713V96.579c-13.466-2.886-23.726-13.146-26.291-26.292z"></path>
                    </svg>
                </span>
                <a href="{{route("showAccout")}}">
                    Tài khoản
                </a>
            </li>           
        </ul>	
    </div>

</div>
<script>
	document.addEventListener('DOMContentLoaded', function(){
        $('#sidebar').click((e)=>{
            $('#hamburger').addClass('is-active');
			$('#sidebar').addClass('sidebar-open');
			$('#main').addClass('main-close');
        });
		$('#hamburger').on('click',function(){
			$('#hamburger').toggleClass('is-active');
			$('#sidebar').toggleClass('sidebar-open');
			$('#main').toggleClass('main-close');
		})

	});
</script>