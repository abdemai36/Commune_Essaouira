$( document ).ready(function() {

    //------------------------------------------------------------
    //----------- Management data of Admins
    //------------------------------------------------------------

    //select admins data
    function select_Data()
    {
        outPut="";
        $.ajax({
            url:"admins/select_adm.php",
            method:"GET",
            dataType:'JSON',
            success:function(data){
                if(data)
                    x=data;
                else
                    x="";
                for(i=0;i<x.length;i++)
                {
                    outPut+="<tr class='text-center'><td>"+data[i].ID_user+"</td><td>"+data[i].F_name_user+"</td><td>"+data[i].L_name_user+"</td><td>"
                    +data[i].Email_user+"</td><td><button class='text-white bg-blue-600 rounded p-2 btn-edit' data-id-adm="+data[i].ID_user+">Modifier</button>&nbsp;"+
                    "<button class='text-white bg-red-600 rounded p-2 btn-delete' data-id-adm="+data[i].ID_user+">Supprimer</button></td></tr>";
                }

                $("#tbody_admin").html(outPut);
            }
        })
    } 
    select_Data();

    //insert admins data
    $("#btn_add").on("click",function(e)
    {
        e.preventDefault();
        var id=$("#id_adm").val();
        var f_name=$("#f_name").val();
        var l_name=$("#l_name").val();
        var email=$("#email").val();
        var pwd=$("#pwd").val();
        MyData={id:id,f_name:f_name,l_name:l_name,pwd:pwd,email,email};
        $.ajax({
            url:"admins/Insert_adm.php",
            method:"POST",
            data:JSON.stringify(MyData),
            success:function(data){    
                Swal.fire({
                    title: data
                })
                $("#Form_adm")[0].reset();
                select_Data();
            }
        })
    });

     //Delete admins data
     $("tbody").on('click','.btn-delete',function(){
        var id_adm=$(this).attr("data-id-adm");
        MyData_del={id_adm:id_adm};
        this_btn=this;
        $.ajax({
            url:"admins/delete_adm.php",
            method:"POST",
            data:JSON.stringify(MyData_del),
            success:function(data)
            {
                Swal.fire({
                    title: data
                })
                $(this_btn).closest("tr").fadeOut("slow");
                select_Data();
            }
        })
    });

    //Edit admins data
    $("tbody").on('click','.btn-edit',function(){

        var id=$(this).attr("data-id-adm");
        MyData={id:id};
        $.ajax({
            url:"admins/edit_adm.php",
            method:"POST",
            dataType:"JSON",
            data:JSON.stringify(MyData),
            success:function(data)
            {
                $("#id_adm").val(data.ID_user);
                $("#f_name").val(data.F_name_user);
                $("#l_name").val(data.L_name_user);
                $("#email").val(data.Email_user);
                $("#pwd").val(data.Pwd_user);
            }
        })
    });

    //------------------------------------------------------------
    //----------- Management data of Categorys
    //------------------------------------------------------------
    //select Categorie data
    function select_categorie_Data()
    {
        outPut_categorie="";
        $.ajax({
            url:"Categories/select_categorie.php",
            method:"GET",
            dataType:'JSON',
            success:function(data){
                if(data)
                    x=data;
                else
                    x="";
                for(i=0;i<x.length;i++)
                {
                    outPut_categorie+="<tr class='text-center'><td>"+data[i].ID_category+"</td><td>"+data[i].Titre_fr+"</td><td dir='rtl'>"+data[i].Titre_ar+"</td>"+
                    "<td><button class='text-white bg-blue-600 rounded p-2 btn-edit' data-id="+data[i].ID_category+">Modifier</button>&nbsp;"+
                    "<button class='text-white bg-red-600 rounded p-2 btn-delete' data-id-Categorie="+data[i].ID_category+">Supprimer</button></td></tr>";
                }

                $("#tbody_categorie").html(outPut_categorie);
            }
        })
    } 
    select_categorie_Data();

    //insert Categorie data
    $("#add_categorie").on("click",function(e)
    {
        e.preventDefault();
        var id=$("#id_categorie").val();
        var category_fr=$("#category_fr").val();
        var category_ar=$("#category_ar").val();

        MyData={id:id,category_fr:category_fr,category_ar:category_ar};
        $.ajax({
            url:"Categories/insert_categorie.php",
            method:"POST",
            data:JSON.stringify(MyData),
            success:function(data){    
                Swal.fire({
                    title: data
                })
                $("#Form_categorie")[0].reset();
                select_categorie_Data();
            }
        })
    });

     //Delete Categorie data
     $("tbody").on('click','.btn-delete',function(){
        var id_categorie=$(this).attr("data-id-Categorie");
        MyData_del={id:id_categorie};
        this_btn=this;
        $.ajax({
            url:"Categories/delete_categorie.php",
            method:"POST",
            data:JSON.stringify(MyData_del),
            success:function(data)
            {
                Swal.fire({
                    title: data
                })
                select_categorie_Data();
                $(this_btn).closest("tr").fadeOut("slow");
            }
        })
    });

    //Edit Categorie data
    $("tbody").on('click','.btn-edit',function(){

        var id=$(this).attr("data-id");
        MyData={id:id};
        $.ajax({
            url:"Categories/edit_categorie.php",
            method:"POST",
            dataType:"JSON",
            data:JSON.stringify(MyData),
            success:function(data)
            {
                $("#id_categorie").val(data.ID_category);
                $("#category_fr").val(data.Titre_fr);
                $("#category_ar").val(data.Titre_ar);
            }
        })
    });

    //------------------------------------------------------------
    //----------- Management data of village
    //------------------------------------------------------------
    //select Categorie data
    function select_village_Data()
    {
        outPut_village="";
        $.ajax({
            url:"Village/select_village.php",
            method:"GET",
            dataType:'JSON',
            success:function(data){
                if(data)
                    x=data;
                else
                    x="";
                for(i=0;i<x.length;i++)
                {
                    outPut_village+="<tr class='text-center'><td>"+data[i].ID_village+"</td><td>"+data[i].Titre_fr+"</td><td dir='rtl'>"+data[i].Titre_ar+"</td>"+
                    "<td><button class='text-white bg-blue-600 rounded p-2 btn-edit' data-id="+data[i].ID_village+">Modifier</button>&nbsp;"+
                    "<button class='text-white bg-red-600 rounded p-2 btn-delete' data-id-village="+data[i].ID_village+">Supprimer</button></td></tr>";
                }

                $("#tbody_village").html(outPut_village);
            }
        })
    } 
    select_village_Data();

    //insert village data
    $("#btn_add_village").on("click",function(e)
    {
        e.preventDefault();
        var id=$("#id_village").val();
        var village_fr=$("#name_village_fr").val();
        var village_ar=$("#name_village_ar").val();

        MyData={id:id,village_fr:village_fr,village_ar:village_ar};
        $.ajax({
            url:"Village/insert_village.php",
            method:"POST",
            data:JSON.stringify(MyData),
            success:function(data){    
                Swal.fire({
                    title: data
                })
                $("#Form_village")[0].reset();
                select_village_Data();
            }
        })
    });

    //Delete village data
    $("tbody").on('click','.btn-delete',function(){
    var id_village=$(this).attr("data-id-village");
    MyData_del={id:id_village};
    this_btn=this;
    $.ajax({
        url:"Village/delete_village.php",
        method:"POST",
        data:JSON.stringify(MyData_del),
        success:function(data)
        {
            Swal.fire({
                title: data
            })
            select_village_Data();
            $(this_btn).closest("tr").fadeOut("slow");
        }
        })
    });

    //Edit vilage data
    $("tbody").on('click','.btn-edit',function(){

        var id=$(this).attr("data-id");
        MyData={id:id};
        $.ajax({
            url:"Village/edit_village.php",
            method:"POST",
            dataType:"JSON",
            data:JSON.stringify(MyData),
            success:function(data)
            {
                $("#id_village").val(data.ID_village );
                $("#name_village_fr").val(data.Titre_fr);
                $("#name_village_ar").val(data.Titre_ar);
            }
        })
    });
    
});