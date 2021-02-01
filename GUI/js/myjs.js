$(document).ready(
    function a()
    {
        $('#a_search').click(function(){
            if($('#signin ul').attr('class') == "activeSignin")
            {
                $('#signin ul').removeClass('activeSignin');
                $('#search ul').toggleClass('activeSearch');
            }
            else if($('#menu ul').attr('class') == "activeMenu")
            {
                $('#menu ul').removeClass('activeMenu');
                $('#search ul').toggleClass('activeSearch');
            }
            else
            {
                $('#search ul').toggleClass('activeSearch');
            }
        })
        $('#a_signin').click(function(){
            if($('#search ul').attr('class') == "activeSearch")
            {
                $('#search ul').removeClass('activeSearch');
                $('#signin ul').toggleClass('activeSignin');
            }
            else if($('#menu ul').attr('class') == "activeMenu")
            {
                $('#menu ul').removeClass('activeMenu');
                $('#signin ul').toggleClass('activeSignin');
            }
            else
            {
                $('#signin ul').toggleClass('activeSignin');
            }
        })
        $('#a_menu').click(function(){
            if($('#search ul').attr('class') == "activeSearch")
            {
                $('#search ul').removeClass('activeSearch');
                $('#menu ul').toggleClass('activeMenu');
            }
            else if($('#signin ul').attr('class') == "activeSignin")
            {
                $('#signin ul').removeClass('activeSignin');
                $('#menu ul').toggleClass('activeMenu');
            }
            else
            {
                $('#menu ul').toggleClass('activeMenu');
            }
        })
    }
)
function ComeBack(){
    history.back();
}
function Location()
{
    window.location = "index.php";
}
function PrintOrder()
{   
    window.print();
}