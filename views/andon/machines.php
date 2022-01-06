<div class="container">
    <div class="card card-raised">
        <div class="card-header bg-transparent px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title mb-0">Machines</h2>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-lg btn-icon" type="button"><i class="material-icons">download</i></button>
                    <button class="btn btn-lg btn-icon" type="button"><i class="material-icons">print</i></button>
                </div>
            </div>
            <div class="row mb-4 mt-3">
                <div class="col-md-4">
                    <mwc-textfield class="w-100" label="Plant" outlined type="text" value=""></mwc-textfield>
                </div>
                <div class="col-md-4">
                    <mwc-textfield class="w-100" label="Area" outlined type="text" value=""></mwc-textfield>
                </div>
                <div class="col-md-4">
                    <mwc-textfield class="w-100" label="Machine/Asset name" outlined type="text" value=""></mwc-textfield>
                </div>
                <div class="col-md-4 mt-3">
                    <mwc-textfield class="w-100" label="Control no." outlined type="text" value=""></mwc-textfield>
                </div>
                <div class="col-md-4 mt-3">
                    <mwc-textfield class="w-100" label="Work center" outlined type="text" value=""></mwc-textfield>
                </div>
                <div class="text-end"><button class="btn btn-primary mt-3" type="button">Save changes</button></div>
            </div>
        </div>
        <div class="card-body p-4">
            <!-- Simple DataTables example-->
            <table id="datatablesSimple" class="text-center">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Machine</th>
                        <th class="text-center">Control no</th>
                        <th class="text-center">Work center</th>
                        <th class="text-center">Work center</th>
                        <th class="text-center">Plant</th>
                        <th class="text-center">Area</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>8</td>
                        <td>Planta 6</td>
                        <td>
                            a
                        </td>
                        <td>
                            c
                        </td>
                        <td>
                            d
                        </td>
                        <td>
                            e
                        </td>
                        <td>
                            f
                        </td>
                        <td>
                            <a href="" class="btn btn-warning">
                                <i class="material-icons icon-sm me-1 text-light">edit</i>
                            </a>
                            <a href="" class="btn btn-danger">
                                <i class="material-icons icon-sm me-1">delete</i>

                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Planta 6</td>
                        <td>
                            a
                        </td>
                        <td>
                            c
                        </td>
                        <td>
                            d
                        </td>
                        <td>
                            e
                        </td>
                        <td>
                            f
                        </td>
                        <td>
                            <a href="" class="btn btn-warning">
                                <i class="material-icons icon-sm me-1 text-light">edit</i>
                            </a>
                            <a href="" class="btn btn-danger">
                                <i class="material-icons icon-sm me-1">delete</i>

                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>