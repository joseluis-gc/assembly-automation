<div>
    <table class="table text-center table-success table-bordered mb-0 mt-3">
        <thead>
            <tr>
                <th scope="col" class="fw-bold"><small>PLANT:</small></th>
                <th scope="col" class="table-light" contenteditable></th>
                <th scope="col" class="fw-bold"><small>AREA:</small></th>
                <th scope="col" class="table-light" contenteditable></th>
                <th scope="col" class="fw-bold"><small>OUTPUT:</small></th>
                <th scope="col" class="table-light" contenteditable></th>
                <th scope="col" class="fw-bold"><small>SHIFT:</small></th>
                <th scope="col" class="table-light" contenteditable></th>
                <th scope="col" class="fw-bold"><small>HC:</small></th>
                <th scope="col" class="table-light">
                    <input type="text" id="hc-head" onkeyup="addHC()" />
                </th>
                <th scope="col" class="fw-bold"><small>DATE:</small></th>
                <th scope="col" class="table-light" contenteditable></th>
                <th scope="col" class="fw-bold"><small>SUPERVISOR:</small></th>
                <th scope="col" class="table-light" contenteditable></th>
            </tr>
        </thead>
    </table>
    <div>
        <table class="table text-center table-bordered mb-0 mt-4">
            <thead>
                <tr class="table-success">
                    <th scope="col" class="fw-bold"><small>HR</small></th>
                    <th scope="col" class="fw-bold"><small>HC</small></th>
                    <th scope="col" class="fw-bold"><small>ITEM NUMBER</small></th>
                    <th scope="col" class="fw-bold"><small>WO NUMBER</small></th>
                    <th scope="col" class="fw-bold"><small>PLAN BY HR</small></th>
                    <th scope="col" class="fw-bold"><small>CUM PLAN</small></th>
                    <th scope="col" class="fw-bold"><small>PLANNED INTERRUPTION</small></th>
                    <th scope="col" class="fw-bold"><small>LESS TIME</small></th>
                    <th scope="col" class="fw-bold"><small>STD TIME</small></th>
                    <th scope="col" class="fw-bold">
                        <small> CALCULATED QTY BY HR <br />
                            (HC - LESS TIME) / STD TIME</small>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="table-info">6:00-7:00am</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" disabled={true} />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" id="dropdownMenuIconsButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Planned interruption
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuIconsButton" style="min-width: 17.5rem">
                                <li>
                                    <a class="dropdown-item" href="#!">SETUP</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">LUNCH</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">SHIFT TURN</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">7:00-8:00am</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" disabled={true} />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" id="dropdownMenuIconsButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Planned interruption
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuIconsButton" style="min-width: 17.5rem">
                                <li>
                                    <a class="dropdown-item" href="#!">SETUP</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">LUNCH</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">SHIFT TURN</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">9:00-10:00am</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" disabled={true} />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" id="dropdownMenuIconsButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Planned interruption
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuIconsButton" style="min-width: 17.5rem">
                                <li>
                                    <a class="dropdown-item" href="#!">SETUP</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">LUNCH</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">SHIFT TURN</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">10:00-11:00am</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" disabled={true} />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" id="dropdownMenuIconsButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Planned interruption
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuIconsButton" style="min-width: 17.5rem">
                                <li>
                                    <a class="dropdown-item" href="#!">SETUP</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">LUNCH</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">SHIFT TURN</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">11:00-12:00pm</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" disabled={true} />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" id="dropdownMenuIconsButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Planned interruption
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuIconsButton" style="min-width: 17.5rem">
                                <li>
                                    <a class="dropdown-item" href="#!">SETUP</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">LUNCH</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">SHIFT TURN</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">12:00-13:00pm</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" disabled={true} />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" id="dropdownMenuIconsButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Planned interruption
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuIconsButton" style="min-width: 17.5rem">
                                <li>
                                    <a class="dropdown-item" href="#!">SETUP</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">LUNCH</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">SHIFT TURN</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">13:00-14:00pm</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" disabled={true} />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" id="dropdownMenuIconsButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Planned interruption
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuIconsButton" style="min-width: 17.5rem">
                                <li>
                                    <a class="dropdown-item" href="#!">SETUP</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">LUNCH</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">SHIFT TURN</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">14:00-15:30pm</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" disabled={true} />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" id="dropdownMenuIconsButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Planned interruption
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuIconsButton" style="min-width: 17.5rem">
                                <li>
                                    <a class="dropdown-item" href="#!">SETUP</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">LUNCH</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">SHIFT TURN</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    function addHC() {
        var elements = document.querySelectorAll(".hc");
        var valor = document.getElementById('hc-head').value;

        for (var i = 0; i < elements.length; i++) {
            elements[i].value = valor;
        }
    }
</script>