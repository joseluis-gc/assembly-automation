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
                        <input type="text" class="hc" name="hc" />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <select name="planned_interruption-1" id="planned_interruption" onchange="add_Select(this);">
                            <option value="0" selected="selected">Planned Interruption</option>
                            <select>
                    </td>
                    <td class="table-info" id="less-time-1"></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">7:00-8:00am</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <select name="planned_interruption" id="planned_interruption" onchange="add_Select(this);">
                            <option value="0" selected="selected">Planned Interruption</option>
                            <select>
                    </td>
                    <td class="table-info" id="less-time-2"></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">9:00-10:00am</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <select name="planned_interruption" id="planned_interruption" onchange="add_Select(this);">
                            <option value="0" selected="selected">Planned Interruption</option>
                            <select>
                    </td>
                    <td class="table-info" id="less-time-3"></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">10:00-11:00am</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <select name="planned_interruption" id="planned_interruption" onchange="add_Select(this);">
                            <option value="0" selected="selected">Planned Interruption</option>
                            <select>
                    </td>
                    <td class="table-info" id="less-time-4"></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">11:00-12:00pm</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <select name="planned_interruption" id="planned_interruption" onchange="add_Select(this);">
                            <option value="0" selected="selected">Planned Interruption</option>
                            <select>
                    </td>
                    <td class="table-info" id="less-time-5"></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">12:00-13:00pm</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <select name="planned_interruption" id="planned_interruption" onchange="add_Select(this);">
                            <option value="0" selected="selected">Planned Interruption</option>
                            <select>
                    </td>
                    <td class="table-info" id="less-time-6"></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">13:00-14:00pm</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <select name="planned_interruption" id="planned_interruption" onchange="add_Select(this);">
                            <option value="0" selected="selected">Planned Interruption</option>
                            <select>
                    </td>
                    <td class="table-info" id="less-time-7"></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
                <tr>
                    <th class="table-info">14:00-15:30pm</th>
                    <td id="hc" class="table-light">
                        <input type="text" class="hc" name="hc" />
                    </td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td class="table-info"></td>
                    <td class="table-light">
                        <select name="planned_interruption" id="planned_interruption" onchange="add_Select(this);">
                            <option value="0" selected="selected">Planned Interruption</option>
                            <select>
                    </td>
                    <td class="table-info" id="less-time-8"></td>
                    <td class="table-info"></td>
                    <td class="table-info"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    const addHC = () => {
        var elements = document.querySelectorAll(".hc");
        var valor = document.getElementById('hc-head').value;

        for (var i = 0; i < elements.length; i++) {
            elements[i].value = valor;
        }
    };

    const SELECTED_PLANNED_INTERRUPTION = [{
            id: "0",
            name: "SETUP",
            value: "1"
        },
        {
            id: "1",
            name: "LUNCH",
            value: "0.5"
        },
        {
            id: "2",
            name: "SHIFT TURN",
            value: "0.083"
        },
        {
            id: "3",
            name: "TIER",
            value: "0.167"
        }

    ];
    window.onload = function() {
        // var elm = document.querySelectorAll("[id='planned_interruption']");
        // console.log({elm})
        // for(var y = 0; y < elm.length; y++ ){
        //     console.log(y)
        // }

        const getInputSelect = document.getElementById('planned_interruption');
        console.log({
            getInputSelect
        })
        for (var x in SELECTED_PLANNED_INTERRUPTION) {
            getInputSelect.options[getInputSelect.options.length] = new Option(
                SELECTED_PLANNED_INTERRUPTION[x].name,
                SELECTED_PLANNED_INTERRUPTION[x].value);
        }
    };

    const add_Select = (elemento) => {
        const valueSelect = elemento.value;
        var element = document.getElementById("less-time-1");
        element.innerHTML = valueSelect;
    };
</script>