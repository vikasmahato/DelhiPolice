var dep = ["dependent1", "dependent2", "dependent3" ];
function hide()
{
    for(var i=0;i<3;i++)
    {
        var divs=dep[i];
        document.getElementById(divs).style.display= "none";
    }
}
function show()
{
    for(var i=0;i<3;i++)
    {
        var divs=dep[i];
        document.getElementById(divs).style.display= "inline-table";
        document.getElementById(divs).style.marginBottom = "0px";
    }
}