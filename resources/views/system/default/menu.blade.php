<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="{{url("/assets/img/ui-sam.jpg")}}" class="img-circle" width="60"></a></p>
            <h5 class="centered">Marcel Newman</h5>

            <li class="mt">
                <a @if(!isset($page) || isset($page[0])) class="active"@endif href="{{url("/")}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a @if(isset($page) && isset($page[1])) class="active"@endif href="javascript:;" >
                    <i class="fa fa-user"></i>
                    <span>Pessoa</span>
                </a>
                <ul class="sub">
                    <li><a @if(isset($page) && isset($page[101])) class="active"@endif href="general.html">Nova Pessoa</a></li>
                    <li><a @if(isset($page) && isset($page[102])) class="active"@endif href="buttons.html">Listar Pessoas</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a @if(isset($page) && isset($page[2])) class="active"@endif href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>Tipos de Rating</span>
                </a>
                <ul class="sub">
                    <li><a @if(isset($page) && isset($page[201])) class="active"@endif href="calendar.html">Novo Tipo de Rating</a></li>
                    <li><a @if(isset($page) && isset($page[202])) class="active"@endif href="gallery.html">Listar Tipos de Rating</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a @if(isset($page) && isset($page[3])) class="active"@endif href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Modalidades</span>
                </a>
                <ul class="sub">
                    <li><a @if(isset($page) && isset($page[301])) class="active"@endif href="{{url("/type/new")}}">Nova Modalidade</a></li>
                    <li><a @if(isset($page) && isset($page[302])) class="active"@endif href="{{url("/type")}}">Listar Modalidades</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a @if(isset($page) && isset($page[4])) class="active"@endif href="javascript:;" >
                    <i class="fa fa-tasks"></i>
                    <span>Competições</span>
                </a>
                <ul class="sub">
                    <li><a href="blank.html">Nova Competição</a></li>
                    <li><a href="login.html">Listar Competições</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a @if(isset($page) && isset($page[5])) class="active"@endif href="javascript:;" >
                    <i class="fa fa-cog"></i>
                    <span>Configurações</span>
                </a>
                <ul class="sub">
                    <li><a @if(isset($page) && isset($page[501])) class="active"@endif href="#">-</a></li>
                    <li class="sub-menu">
                      <a @if(isset($page) && isset($page[502])) class="active"@endif href="javascript:;" >
                          <i class="fa fa-map-marker"></i>
                          <span>Federação</span>
                      </a>
                      <ul class="sub">
                          <li><a @if(isset($page) && isset($page[5021])) class="active"@endif href="{{url("/settings/federation/new")}}">Nova Federação</a></li>
                          <li><a @if(isset($page) && isset($page[5022])) class="active"@endif href="{{url("/settings/federation/")}}">Listar Federações</a></li>
                      </ul>
                  </li>
                    </li>
                    <li class="sub-menu">
                        <a @if(isset($page) && isset($page[503])) class="active"@endif href="javascript:;" >
                            <i class="fa fa-map-marker"></i>
                            <span>Cidade</span>
                        </a>
                        <ul class="sub">
                            <li><a @if(isset($page) && isset($page[5031])) class="active"@endif href="{{url("/settings/city/new")}}">Nova Cidade</a></li>
                            <li><a @if(isset($page) && isset($page[5032])) class="active"@endif href="{{url("/settings/city/")}}">Listar Cidades</a></li>
                            <li><a @if(isset($page) && isset($page[5033])) class="active"@endif href="{{url("/settings/state/new")}}">Novo Estado</a></li>
                            <li><a @if(isset($page) && isset($page[5034])) class="active"@endif href="{{url("/settings/state/")}}">Listar Estados</a></li>
                            <li><a @if(isset($page) && isset($page[5035])) class="active"@endif href="{{url("/settings/country/new")}}">Novo País</a></li>
                            <li><a @if(isset($page) && isset($page[5036])) class="active"@endif href="{{url("/settings/country/")}}">Listar Países</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
