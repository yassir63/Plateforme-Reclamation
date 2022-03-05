var mysidenav , links , OCbtn , user_name , Nr , Or , containers , welcome , form
    , recs , link2;
mysidenav = document.getElementsByClassName("sidenav")[0];
links = mysidenav.getElementsByTagName("button");
link = "Accueil_adm.php"
link = "Accueil_adm.php"
user_name = mysidenav.getElementsByTagName("h6")[0];
containers = document.getElementsByClassName("container");
OCbtn = links[0];
recs = document.getElementById('recs');
user_name.style.display="none";
close();
function open()
{
    mysidenav.style.width = "320px";
    for ( i = 1 ; i < links.length ; i ++ )
    {
        var a = links [i] ;
        a.style.display = "block";
    }
    user_name.style.display="";

}
function close()
{
    mysidenav.style.width = "50px";
    for ( i = 1 ; i < links.length ; i ++ )
    {
        links [i].style.display = "none";
    }
    user_name.style.display="none";
}
OCbtn.onclick = function ()
{
    var size = mysidenav.style.width ;
    if ( size == "50px" )
        return open();
    else
        return close();
}
const f = () =>
{
    if ( window.location.href.indexOf("rsr")>-1)
    {
        let link = 'reclamation_sans_reponse.php' ;
        window.location.href = link ;
    }
    else
    {
        let link = 'Accueil_adm.php' ;
        window.location.href = link ;
    }
    
}
const clickablerow = (ids) =>
{
    if ( window.location.href.indexOf("Accueil_adm.php")>-1)
    {
        let link = 'reply.php?ids=' ;
        link += ids;
        window.location.href = link ;
    }
    else
    {
        let link = 'reply.php?ids=' ;
        link += ids + '&rsr=y';
        window.location.href = link ;
    }
}
const sortby = (index) =>
{
    let rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    switching = true;
    dir = "asc";
    while (switching) 
    {
        switching = false;
        rows = recs.rows;
        for (i = 1; i < (rows.length - 1); i++) 
        {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[index];
            y = rows[i + 1].getElementsByTagName("TD")[index];
            if (dir == "asc") 
            {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) 
                {
                    shouldSwitch = true;
                    break;
                }
            } 
            else if (dir == "desc") 
            {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) 
                {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) 
        {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount ++;
        } 
        else 
        {
            if (switchcount == 0 && dir == "asc") 
            {
                dir = "desc";
                switching = true;
            }
        }
    }
    for ( i = 1 ; i < rows.length ; i ++ )
    {
        let N = rows[i].cells.item(0); 
        N.innerHTML = i ;
    }
}
const names = [ "NOM" , "PRENOM","SUJET","RECLAMATION","REPONSE"] 
const searchIn = (index) =>
{
    let row , cell , name
    row = recs.rows[0] ;
    cell = row.cells.item(index+1);
    name = cell.firstChild.tagName;
    let s = document.createElement("th");
    if ( name == "INPUT" )
    {
        s.setAttribute("onclick","sortby("+index+")")
        s.setAttribute("oncontextmenu","searchIn("+index+")")
        s.innerHTML = names[index];
        cell.parentNode.replaceChild(s,cell)
    }
    else
    {
        s.innerHTML += '<input id="'+index+'" oninput="filter()" type="search" class="form-control" oncontextmenu ="searchIn('+index+')" >'
        cell.parentNode.replaceChild(s,cell)
    }
}
document.oncontextmenu = (e) =>
{
    e = e.target 
    if ( e.tagName == "TR" || e.tagName == "TH" || e.tagName == "TD" || e.tagName == "INPUT" )
    {
        return false ;
    }
}
const filter = () =>
{
    var inputs = document.getElementsByTagName("input");
    for ( i = 0 ; i < inputs.length ; i ++ )
    {
        let input = inputs[i] ;
        let index = parseInt(input.id) ;
        for ( j = 1 ; j < recs.rows.length ; j ++ )
        {
            let row = recs.rows[j];
            let cell = row.cells.item(index+1);
            if ( cell.innerHTML.indexOf(input.value)>-1 )
            {
                cell.setAttribute("in","n")
                let k 
                for ( k = 0 ; k < row.cells.length ; k ++ )
                {
                    let c = row.cells[k]
                    if ( c.getAttribute("in") == "y")
                    break ;
                }
                if ( k == row.cells.length )
                    row.style.display = "";
                else
                    row.style.display = "none";
            }
            else
            {
                row.style.display = "none";
                cell.setAttribute("in","y")
            }
        }
    }
}
