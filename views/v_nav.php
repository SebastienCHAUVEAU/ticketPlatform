<header>
  <div class="topnav">

    <div class="burger_list">
      <p class="hideElement" id="title_nav_bar">Menu <i id="nav_icon_bar" class="fa fa-bars"></i></p>
    </div>

    <div class="topnav_list">
      <a id="dashboardLink" <?= $isActiveDashboard ?> href="/dashboard">Dashboard</a>
      <a id="ticketsLink" <?= $isActiveTickets ?> href="/tickets">Tickets</a>
      <a id="societiesLink" <?= $isActiveSocieties ?> href="/tenants">Sociétés</a>
      <a id="accountsLink" <?= $isActiveAccounts ?> href="/accounts">Comptes</a>
      <a id="logoutLink" href="/logout">Déconnexion</a>
    </div>

  </div>

</header>