@props(['rule_id'])

<style>
    #myDIV-{{$rule_id}} {
        width: 100%;
        padding: 0;
        text-align: center;
        background-color: rgb(31 41 55);
        margin-top: 20px;
        overflow: hidden;
        height: 0;
        transition: height 0.5s ease-out, padding 0.5s ease-out;
    }

    #myDIV-{{$rule_id}}.show {
        height: 100px;
        border-radius: 10px;
        padding: 50px 0;
    }

    #toggleButton-{{ $rule_id }} {
        color: white;
        font-size: 24px;
        cursor: pointer;
        background-color: transparent;
        border: none;
        outline: none;
        transition: transform 0.3s ease;
    }

    #toggleButton-{{ $rule_id }}.rotate {
        transform: rotate(180deg);
    }
</style>

<button id="toggleButton-{{$rule_id}}" class="text-white-500 text-2xl cursor-pointer bg-transparent border-none outline-none transition-transform duration-300 ease" onclick="myFunction({{$rule_id}})">&#9660;</button>

<script>
    function myFunction(rule_id) {
        var div = document.getElementById("myDIV-" + rule_id);
        var button = document.getElementById("toggleButton-" + rule_id);

        div.classList.toggle("show");

        button.classList.toggle("rotate");
    }
</script>