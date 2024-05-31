# Test Lamusée - CHANG Toma


#[Route('/', name: 'app_user_index', methods: ['GET'])]
public function index(UserRepository $userRepository, SerializerInterface $serializer): Response
{
    $users = $userRepository->findAll(); // Récupère tous les utilisateurs
    $data = $serializer->serialize($users, 'json', ['groups' => 'user']); // Sérialise les données en JSON
//dd($data);

    return $this->render('dashboard/index.html.twig', [
        'path' => './dashboard/pages/users/users.html.twig',
        'people' => json_decode($data, true)  //Décode le JSON pour le passer à Twig
    ]);
}


{% extends 'base.html.twig' %}

{% block title %}Back-office | Lamusée{% endblock %}

{% block body %}

<div id="app">
    <Sidebar @toggle-sidebar="toggleSidebar" :is-open="isSidebarOpen"></Sidebar>

    <Content :is-sidebar-open="isSidebarOpen">
        {% include path %}
    </Content>

</div>

{% endblock %}

![alt text](./assets/img/image.png)
