<div class="row">
    <div class="col-lg-4">
        <div class="card card-small mb-4 pt-3">
            <div class="card-header border-bottom text-center">
                <div class="mb-3 mx-auto">
                    <img class="rounded-circle" src="{{ asset( 'assets2/img/saint.jpg' ) }}" alt="User Avatar" width="110">
                </div>
                <h4 class="mb-0">{{ Auth::user()->name }}</h4>
                <span class="text-muted d-block mb-2">Ejecutivo comercial</span>
                <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2"><i class="material-icons mr-1">person_add</i>Follow</button>
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta 
                        qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Datos Cuenta</h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <div class="row">
                        <div class="col">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="feFirstName" placeholder="Nombre (s)" value="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="feLastName" placeholder="Apellido Paterno" value="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="feLastName" placeholder="Apellido Materno" value="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="password" class="form-control" id="fePassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="feInputAddress" placeholder="Direccion">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="feInputCity" placeholder="Ciudad">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select id="feInputState" class="form-control">
                                            <option selected>Estado</option>
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control" id="inputZip" placeholder="CP">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="feDescription">Observaciones</label>
                                        <textarea class="form-control" name="feDescription" rows="4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-accent">Update Account</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>