function show_companies(){
    document.getElementById('companies').style.display="block";
    document.getElementById('dashboard').style.display="none";
    document.getElementById('chart').style.display="none";
    document.getElementById('manage_admins').style.display="none";
    document.getElementById('add_admin').style.display="none";
    document.getElementById('clients').style.display="none";
}
function show_clients(){
    document.getElementById('companies').style.display="none";
    document.getElementById('dashboard').style.display="none";
    document.getElementById('chart').style.display="none";
    document.getElementById('manage_admins').style.display="none";
    document.getElementById('add_admin').style.display="none";
    document.getElementById('clients').style.display="block";
}
function show_chart(){
    document.getElementById('companies').style.display="none";
    document.getElementById('dashboard').style.display="none";
    document.getElementById('chart').style.display="block";
    document.getElementById('manage_admins').style.display="none";
    document.getElementById('add_admin').style.display="none";
    document.getElementById('clients').style.display="none";
}
function show_manageadmin(){
    document.getElementById('companies').style.display="none";
    document.getElementById('dashboard').style.display="none";
    document.getElementById('chart').style.display="none";
    document.getElementById('manage_admins').style.display="block";
    document.getElementById('add_admin').style.display="none";
    document.getElementById('clients').style.display="none";
}
function show_addadmin(){
    document.getElementById('companies').style.display="none";
    document.getElementById('dashboard').style.display="none";
    document.getElementById('chart').style.display="none";
    document.getElementById('manage_admins').style.display="none";
    document.getElementById('add_admin').style.display="block";
    document.getElementById('clients').style.display="none";
}
function show_dashboard(){
    document.getElementById('companies').style.display="none";
    document.getElementById('dashboard').style.display="block";
    document.getElementById('chart').style.display="none";
    document.getElementById('manage_admins').style.display="none";
    document.getElementById('add_admin').style.display="none";
    document.getElementById('clients').style.display="none";
}