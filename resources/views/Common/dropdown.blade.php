<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
        aria-expanded="false">
        Select Pattern
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="#">
                AH &raquo;
            </a>
            <ul class="dropdown-menu dropdown-submenu">
                <li>
                    <a class="dropdown-item" onclick="changePattern('A','H')">A</a>
                </li>
                <li>
                    <a class="dropdown-item" onclick="changePattern('H','A')">H</a>
                </li>
            </ul>
        </li>
        <li><a class="dropdown-item" href="#">
            BR &raquo;
        </a>
        <ul class="dropdown-menu dropdown-submenu">
            <li>
                <a class="dropdown-item" onclick="changePattern('B','R')">B</a>
            </li>
            <li>
                <a class="dropdown-item" onclick="changePattern('R','B')">R</a>
            </li>

        </ul>
    </li>
    </ul>
</div>
<script>
    function changePattern(start, end){
        trcontent(0, start, end)
        document.getElementById('start').value = start;
        document.getElementById('end').value = end;

    }
</script>
