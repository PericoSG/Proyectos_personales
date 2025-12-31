import { Component, model } from '@angular/core';
import { MatCard, MatCardModule } from '@angular/material/card';
import { MatIcon, MatIconModule } from '@angular/material/icon';
import { DomSanitizer, SafeResourceUrl } from '@angular/platform-browser';

@Component({
  selector: 'app-participants',
  imports: [MatCardModule, MatIconModule, MatIcon],
  templateUrl: './participants.component.html',
  styleUrl: './participants.component.css'
})
export class ParticipantsComponent {

  participants = [
    {
      id: 1,
      name: 'Asha',
      song: 'Turista',
      image: 'img/participants/asha.jpg',
      description: `
      <p><strong>Asha</strong> destaca por su estilo vibrante y personal, combinando energía, sensibilidad y una identidad artística muy marcada. Su presencia escénica mezcla emoción y movimiento con una estética cuidada.</p>
      <p>En el escenario transmite carisma y fuerza, conectando con el público desde el primer instante gracias a su autenticidad y su propuesta visual.</p>
    `,
      songDescription: `
      <p><em>“Turista”</em> explora el amor, la distancia y la identidad desde la mirada de una mujer en constante movimiento. Habla de un romance fugaz bajo el sol del Mediterráneo que se desvanece con el tiempo.</p>
      <p>La protagonista recorre recuerdos, estaciones y paisajes mientras busca a alguien que ya no está, dudando si lo vivido fue real o parte del viaje.</p>
    `,
      video: 'https://secure-embed.rtve.es/drmn/embed/video/16861626'
    },

    {
      id: 2,
      name: 'Atyat',
      song: 'Dopamina',
      image: 'img/participants/atyat.jpg',
      description: `
      <p><strong>Atyat</strong> es una artista que fusiona influencias árabes y latinas con una personalidad fuerte y magnética. Su estilo mezcla sensualidad, ritmo y una identidad cultural muy marcada.</p>
      <p>Su presencia escénica destaca por la energía, la elegancia y la conexión emocional que transmite en cada actuación.</p>
    `,
      songDescription: `
      <p><em>“Dopamina”</em> es un tema que celebra el deseo, la atracción y la euforia del amor. Combina ritmos latinos y árabes para crear una atmósfera intensa y envolvente.</p>
      <p>La canción busca transmitir adrenalina y emoción desde la primera nota, reflejando la química entre dos personas que se desean.</p>
    `,
      video: 'https://secure-embed.rtve.es/drmn/embed/video/16861627'
    },

    {
      id: 3,
      name: 'Dani J',
      song: 'Bailándote',
      image: 'img/participants/danij.jpg',
      description: `
      <p><strong>Dani J</strong> es un artista con una voz cálida y un estilo cercano que mezcla pop y ritmos urbanos. Su música destaca por su sensibilidad y su capacidad para transmitir emociones.</p>
      <p>En directo ofrece actuaciones llenas de energía y conexión, creando un ambiente íntimo y a la vez festivo.</p>
    `,
      songDescription: `
      <p><em>“Bailándote”</em> es una historia de amor contada a través del baile, donde dos personas se encuentran sin palabras y se entienden solo con el movimiento.</p>
      <p>La canción celebra la conexión instantánea y la magia de un momento compartido en la pista.</p>
    `,
      video: ''
    },

    {
      id: 4,
      name: 'Dora & Marlon Collins',
      song: 'Rakatá',
      image: 'img/participants/dora&marlon.jpg',
      description: `
      <p><strong>Dora</strong> y <strong>Marlon Collins</strong> forman un dúo explosivo que mezcla juventud, frescura y una química artística evidente. Su estilo combina pop, electrónica y ritmos latinos.</p>
      <p>Su propuesta destaca por la energía, el juego escénico y la complicidad entre ambos artistas.</p>
    `,
      songDescription: `
      <p><em>“Rakatá”</em> fusiona balada, cumbia, reggaetón y electrónica para contar un juego de seducción y tensión entre dos jóvenes que se atraen y discuten a la vez.</p>
      <p>La canción refleja ese tira y afloja emocional tan típico de las relaciones intensas y juveniles.</p>
    `,
      video: 'https://secure-embed.rtve.es/drmn/embed/video/16861630'
    },

    {
      id: 5,
      name: 'Funambulista',
      song: 'SOBRAN GILIPO**AS',
      image: 'img/participants/funambulista.jpg',
      description: `
      <p><strong>Funambulista</strong> es un artista consolidado con un estilo íntimo, emocional y directo. Su música combina pop, sensibilidad y letras que conectan con el público.</p>
      <p>Su propuesta destaca por la honestidad y la capacidad de transmitir historias reales con un toque personal.</p>
    `,
      songDescription: `
      <p><em>“SOBRAN GILIPO**AS”</em> es un tema catártico que habla de alejarse de personas que no aportan y de liberarse de energías negativas.</p>
      <p>La canción critica a quienes se aprovechan de los demás y celebra la decisión de poner límites.</p>
    `,
      video: ''
    },

    {
      id: 6,
      name: 'Greg Taro',
      song: 'Velita',
      image: 'img/participants/greg.jpg',
      description: `
      <p><strong>Greg Taro</strong> es un artista con un estilo romántico y moderno, conocido por su voz suave y su sensibilidad musical.</p>
      <p>Su propuesta combina emoción, cercanía y una estética cálida que conecta con el público.</p>
    `,
      songDescription: `
      <p><em>“Velita”</em> es una canción que habla de mantener viva la llama de un amor, recordando cada detalle de una relación pasada o presente.</p>
      <p>El tema mezcla nostalgia y esperanza, creando una atmósfera íntima y emocional.</p>
    `,
      video: ''
    },

    {
      id: 7,
      name: 'Izan Llunas',
      song: '¿Qué vas a hacer?',
      image: 'img/participants/izan.jpg',
      description: `
      <p><strong>Izan Llunas</strong> es un joven artista con una voz potente y una presencia escénica sorprendente para su edad. Su estilo combina pop moderno y emoción juvenil.</p>
      <p>Su propuesta destaca por la frescura, la energía y la autenticidad que transmite en cada actuación.</p>
    `,
      songDescription: `
      <p><em>“¿Qué vas a hacer?”</em> habla del primer flechazo, ese momento que lo cambia todo y que se vive con intensidad absoluta.</p>
      <p>La canción refleja la ilusión, la duda y la emoción de un amor que nace de forma inesperada.</p>
    `,
      video: 'https://secure-embed.rtve.es/drmn/embed/video/16861638'
    },

    {
      id: 8,
      name: 'Kenneth',
      song: 'Los Ojos No Mienten',
      image: 'img/participants/kenneth.jpg',
      description: `
      <p><strong>Kenneth</strong> es un artista con un estilo elegante y moderno, combinando pop y ritmos urbanos con una sensibilidad especial.</p>
      <p>Su presencia escénica destaca por la naturalidad, la energía y la conexión emocional que transmite.</p>
    `,
      songDescription: `
      <p><em>“Los Ojos No Mienten”</em> nace de un encuentro fugaz en una fiesta donde dos personas conectan sin necesidad de palabras.</p>
      <p>La canción celebra la química instantánea y la magia de las miradas que lo dicen todo.</p>
    `,
      video: 'https://secure-embed.rtve.es/drmn/embed/video/16861639'
    },

    {
      id: 9,
      name: 'KITAI',
      song: 'El Amor Te Da Miedo',
      image: 'img/participants/kitai.jpg',
      description: `
      <p><strong>KITAI</strong> es una banda con un estilo potente, visceral y emocional, combinando rock alternativo y energía explosiva.</p>
      <p>Su propuesta destaca por la intensidad, la autenticidad y la fuerza de sus directos.</p>
    `,
      songDescription: `
      <p><em>“El Amor Te Da Miedo”</em> habla de relaciones profundas donde una de las partes teme comprometerse o entregarse por completo.</p>
      <p>La canción es honesta y emocional, basada en experiencias reales y sentimientos intensos.</p>
    `,
      video: 'https://secure-embed.rtve.es/drmn/embed/video/16861640'
    },

    {
      id: 10,
      name: 'KU Minerva',
      song: 'No Volveré a Llorar',
      image: 'img/participants/minerva.jpg',
      description: `
      <p><strong>KU Minerva</strong> es una artista con una voz poderosa y un estilo emocional que mezcla pop y sensibilidad personal.</p>
      <p>Su propuesta destaca por la fuerza interpretativa y la capacidad de transmitir vulnerabilidad y determinación.</p>
    `,
      songDescription: `
      <p><em>“No Volveré a Llorar”</em> refleja desilusión, agotamiento y liberación emocional tras una etapa difícil.</p>
      <p>La canción habla de romper ataduras, sanar y mirar hacia adelante con fuerza renovada.</p>
    `,
      video: ''
    },

    {
      id: 11,
      name: 'Luna Ki',
      song: 'Bomba de Amor',
      image: 'img/participants/lunaKi.jpg',
      description: `
      <p><strong>Luna Ki</strong> es una artista innovadora que mezcla pop experimental, estética futurista y una identidad única. Es la única de esta edición en repetir ya que estuvo en 2022 con el tema <em>"Voy a Morir"</em></p>
      <p>Su propuesta destaca por la creatividad, la libertad artística y un estilo que rompe moldes.</p>
    `,
      songDescription: `
      <p><em>“Bomba de Amor”</em> es un canto a la libertad, la seducción y el amor sin ataduras.</p>
      <p>La canción invita a dejarse llevar por el baile, la pasión y la energía del momento.</p>
    `,
      video: 'https://secure-embed.rtve.es/drmn/embed/video/16861645',
    },

    {
      id: 12,
      name: 'María León & Julia Medina',
      song: 'Las Damas y el Vagabundo',
      image: 'img/participants/maria&julia.jpg',
      description: `
      <p><strong>María León</strong> y <strong>Julia Medina</strong> forman un dúo lleno de sensibilidad, fuerza vocal y complicidad artística.</p>
      <p>Su propuesta destaca por la armonía, la emoción y la conexión que transmiten juntas.</p>
    `,
      songDescription: `
      <p><em>“Las Damas y el Vagabundo”</em> celebra la sororidad, la amistad y la unión entre mujeres.</p>
      <p>La canción es luminosa, emotiva y transmite un mensaje de apoyo mutuo y fortaleza compartida.</p>
    `,
      video: 'https://secure-embed.rtve.es/drmn/embed/video/16861655'
    },

    {
      id: 13,
      name: 'Mayo',
      song: 'Tócame',
      image: 'img/participants/mayo.jpg',
      description: `
      <p><strong>Mayo</strong> es un artista con un estilo emocional y moderno, combinando pop y electrónica con una sensibilidad íntima.</p>
      <p>Su propuesta destaca por la vulnerabilidad, la intensidad y la estética cuidada.</p>
    `,
      songDescription: `
      <p><em>“Tócame”</em> habla del autoengaño y la adicción a relaciones tóxicas que atrapan entre fantasía y realidad.</p>
      <p>La canción refleja la lucha interna entre lo que se desea y lo que realmente hace daño.</p>
    `,
      video: 'https://secure-embed.rtve.es/drmn/embed/video/16861657'
    },

    {
      id: 14,
      name: 'Mikel Herzog Jr.',
      song: 'Mi Mitad',
      image: 'img/participants/mikelHerzog.jpg',
      description: `
      <p><strong>Mikel Herzog Jr.</strong> es un artista con una voz profunda y un estilo introspectivo que combina pop y emoción personal.</p>
      <p>Su propuesta destaca por la sensibilidad, la honestidad y la fuerza interpretativa.</p>
    `,
      songDescription: `
      <p><em>“Mi Mitad”</em> explora la lucha interna entre luz y oscuridad dentro de uno mismo.</p>
      <p>La canción habla de reconciliar fuerzas opuestas y enfrentarse a la propia mente.</p>
    `,
      video: ''
    },

    {
      id: 15,
      name: 'Miranda! & bailamamà',
      song: 'Despierto Amándote',
      image: 'img/participants/bailamama.jpg',
      description: `
      <p><strong>Miranda!</strong> y <strong>bailamamà</strong> aportan una propuesta colorida, divertida y llena de energía. Su estilo combina pop, humor y una estética muy reconocible.</p>
      <p>Su presencia escénica destaca por la alegría, la teatralidad y la conexión con el público.</p>
    `,
      songDescription: `
      <p><em>“Despierto Amándote”</em> es un tema XXL que celebra el amor, la vida y la intensidad de los sentimientos sin vergüenza.</p>
      <p>La canción invita a vivir con color, pasión y libertad emocional.</p>
    `,
      video: 'https://secure-embed.rtve.es/drmn/embed/video/16861666'
    },

    {
      id: 16,
      name: 'Rosalinda Galán',
      song: 'Mataora',
      image: 'img/participants/rosalinda.jpg',
      description: `
      <p><strong>Rosalinda Galán</strong> es una artista con una voz poderosa y una presencia escénica magnética. Su estilo mezcla tradición, fuerza y una identidad muy marcada.</p>
      <p>Su propuesta destaca por la intensidad emocional y la profundidad interpretativa.</p>
    `,
      songDescription: `
      <p><em>“Mataora”</em> da voz a Carmen, la protagonista de la novela de Mérimée, una mujer libre, deseada y nunca poseída.</p>
      <p>La canción reivindica su historia desde una perspectiva propia, fuerte y empoderada.</p>
    `,
      video: 'https://secure-embed.rtve.es/drmn/embed/video/16861675'
    },

    {
      id: 17,
      name: 'The Quinquis',
      song: 'Tú No Me Quieres',
      image: 'img/participants/quinquis.jpg',
      description: `
      <p><strong>The Quinquis</strong> es un dúo con un estilo urbano, directo y emocional. Su música destaca por la autenticidad y la fuerza de sus letras.</p>
      <p>Su propuesta combina actitud, vulnerabilidad y una estética muy personal.</p>
    `,
      songDescription: `
      <p><em>“Tú No Me Quieres”</em> nace del despecho tras sentirse utilizado en una relación donde se fingió un vínculo afectivo.</p>
      <p>La canción expresa rabia, desengaño y la necesidad de romper con lo que no es real.</p>
    `,
      video: 'https://secure-embed.rtve.es/drmn/embed/video/16861677'
    },

    {
      id: 18,
      name: 'Tony Grox & Lucycalys',
      song: 'T Amaré',
      image: 'img/participants/Tony&Luci.jpg',
      description: `
      <p><strong>Tony Grox</strong> y <strong>Lucycalys</strong> forman un dúo que mezcla pop contemporáneo con matices flamencos y una sensibilidad muy emocional.</p>
      <p>Su propuesta destaca por la armonía vocal, la química artística y la calidez interpretativa.</p>
    `,
      songDescription: `
      <p><em>“T Amaré”</em> es un mensaje universal al amor en todas sus formas: amistad, familia o pareja.</p>
      <p>La canción va de lo íntimo a lo colectivo, creando un final luminoso y lleno de esperanza.</p>
    `,
      video: 'https://secure-embed.rtve.es/drmn/embed/video/16861679'
    }
  ]

  modalOpen: boolean = false;
  safeVideoUrl!: SafeResourceUrl
  participantModal: any = "";

  constructor(private sanitizer: DomSanitizer) { }



  OpenModal(participantId: number) {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    }); // Esto sube hasta arriba para no tener que hacer scroll para ir al modal

    this.participantModal = this.buscaParticipante(participantId)
    this.safeVideoUrl = this.sanitizer.bypassSecurityTrustResourceUrl(this.participantModal.video); // Con esto no bloquea la seguridad del iframe


    this.modalOpen = true;
  }

  closeModal() {
    this.modalOpen = false;
  }

  buscaParticipante(participantId: number) {
    const participant = this.participants.find(p => p.id === participantId);
    console.log(participant)
    return participant;
  }


}
