const orders = [
  {
    id: "#3421",
    from: "Rua das Laranjeiras, 120",
    to: "Av. Central, 551",
    status: "Aguardando entregador",
  },
  {
    id: "#3422",
    from: "Mercado Santa Fé",
    to: "Rua Esperança, 88",
    status: "Em rota",
  },
  {
    id: "#3423",
    from: "Pizzaria Nova",
    to: "Rua do Porto, 19",
    status: "Prioridade alta",
  },
];

const drivers = [
  { name: "Ana Souza", eta: "3 min" },
  { name: "Carlos Lima", eta: "5 min" },
  { name: "Isadora Alves", eta: "8 min" },
];

const calls = [
  {
    pickup: "Padaria do Vale",
    dropoff: "Rua Aurora, 310",
    eta: "10 min",
  },
  {
    pickup: "Burguer House",
    dropoff: "Av. das Flores, 920",
    eta: "12 min",
  },
];

const routes = [
  "Retirada: Padaria do Vale",
  "Entrega: Rua Aurora, 310",
  "Retirada: Burguer House",
  "Entrega: Av. das Flores, 920",
];

const ordersList = document.getElementById("orders-list");
const driversList = document.getElementById("drivers-list");
const nextCallout = document.getElementById("next-callout");
const routeTimeline = document.getElementById("route-timeline");
const requestForm = document.getElementById("request-form");

const roleButtons = document.querySelectorAll(".role-button");
const panels = document.querySelectorAll("[data-panel]");

const renderOrders = () => {
  ordersList.innerHTML = "";
  orders.forEach((order) => {
    const item = document.createElement("li");
    item.className = "status-item";
    item.innerHTML = `
      <div>
        <strong>${order.id}</strong>
        <p>${order.from} → ${order.to}</p>
      </div>
      <span class="badge">${order.status}</span>
    `;
    ordersList.appendChild(item);
  });
};

const renderDrivers = () => {
  driversList.innerHTML = "";
  drivers.forEach((driver) => {
    const item = document.createElement("li");
    item.className = "status-item";
    item.innerHTML = `
      <div>
        <strong>${driver.name}</strong>
        <p>Chegada estimada</p>
      </div>
      <span class="badge">${driver.eta}</span>
    `;
    driversList.appendChild(item);
  });
};

const renderCallout = () => {
  const call = calls[0];
  nextCallout.textContent = `${call.pickup} → ${call.dropoff} · Chegada em ${call.eta}`;
};

const renderRoute = () => {
  routeTimeline.innerHTML = "";
  routes.forEach((step) => {
    const item = document.createElement("li");
    item.textContent = step;
    routeTimeline.appendChild(item);
  });
};

const handleRoleSwitch = (event) => {
  const role = event.currentTarget.dataset.role;

  roleButtons.forEach((button) => {
    const isActive = button.dataset.role === role;
    button.classList.toggle("active", isActive);
    button.setAttribute("aria-selected", String(isActive));
  });

  panels.forEach((panel) => {
    panel.hidden = panel.dataset.panel !== role;
  });
};

roleButtons.forEach((button) => {
  button.addEventListener("click", handleRoleSwitch);
});

requestForm.addEventListener("submit", (event) => {
  event.preventDefault();
  const data = new FormData(requestForm);
  const pickup = data.get("pickup");
  const dropoff = data.get("dropoff");
  const priority = data.get("priority");

  orders.unshift({
    id: `#${Math.floor(Math.random() * 9000) + 1000}`,
    from: pickup,
    to: dropoff,
    status: `Solicitado (${priority})`,
  });

  renderOrders();
  requestForm.reset();
});

renderOrders();
renderDrivers();
renderCallout();
renderRoute();
