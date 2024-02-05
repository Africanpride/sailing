<div>
    <svg class="flex-shrink-0 w-18 h-18 text-gray-800 dark:text-gray-100"
     xmlns="http://www.w3.org/2000/svg" width="75" height="75"
     viewBox="-9.375 -9.375 93.75 93.75" version="1.1"
     xmlns="http://www.w3.org/2000/svg" style="transform:rotate(-90deg)">
    <circle r="27.5" cx="37.5" cy="37.5" fill="transparent"
            stroke="#e0e0e0" stroke-width="6" stroke-dasharray="172.70000000000002px"
            stroke-dashoffset="0"></circle>
    <circle r="27.5" cx="37.5" cy="37.5" stroke="#2e96c9"
            stroke-width="7" stroke-linecap="round"
            stroke-dashoffset="{{ 172.7 - ($percentage / 100) * 172.7 }}px"
            fill="transparent" stroke-dasharray="172.70000000000002px"></circle>
    <text x="25px" y="41px" fill="#90cae9" font-size="11px" font-weight="bold"
          style="transform:rotate(90deg) translate(0px, -71px); color:azure;">{{ $percentage }} %</text>
</svg>

</div>
