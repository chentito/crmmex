<div class="row">
    <div class="col-lg-4">
        <div class="card card-small mb-4 pt-3">
            <div class="card-body border-bottom text-center">
                <div class="mb-3 mx-auto">
                    <img class="rounded-circle" src="{{ asset( 'assets2/img/saint.jpg' ) }}" alt="User Avatar" width="110">
                </div>
                <h4 class="mb-0">{{ Auth::user()->name }} {{ Auth::user()->apPat }}</h4>
                <span class="text-muted d-block mb-2">Ejecutivo comercial</span>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item px-4">
                    <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2">Workload</strong>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">
                                <span class="progress-value">74%</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item p-4">
                    <strong class="text-muted d-block mb-2">Description</strong>
                    <span>
                        {{ Auth::user()->comentarios }}
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card card-small mb-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <strong class="text-muted d-block mb-2 mt-2 ml-2">Datos Cuenta</strong>
                    <div class="row">
                        <div class="col">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="feFirstName" placeholder="Nombre (s)" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="feLastName" placeholder="Apellido Paterno" value="{{ Auth::user()->apPat }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control form-control-sm" id="feLastName" placeholder="Apellido Materno" value="{{ Auth::user()->apMat }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control form-control-sm" id="feEmailAddress" placeholder="Email" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="password" class="form-control form-control-sm" id="fePassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" id="feInputAddress" placeholder="Direccion"
                                    value="{{ Auth::user()->direccion->calle }} Int. {{ Auth::user()->direccion->interior }} Ext. {{ Auth::user()->direccion->exterior }}, Col {{ Auth::user()->direccion->colonia }}">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control form-control-sm" id="feInputCity" placeholder="Ciudad" value="{{ Auth::user()->direccion->municipio }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select id="feInputState" class="custom-select custom-select-sm">
                                            <option selected>Estado</option>
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control form-control-sm" id="inputZip" placeholder="CP" value="{{ Auth::user()->direccion->cp }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm {{$btn}}">Update Account</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
