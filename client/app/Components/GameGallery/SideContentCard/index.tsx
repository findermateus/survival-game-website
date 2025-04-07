import "./styles.css";
import ContainerButton from "~/Components/Assets/ContainerButton";
import YoutubeDeveloper from "~/Components/Assets/YoutubeDeveloper";

const SideContentCard = () => {
    return <section className="side-content-card">
        <ContainerButton title="Lorem ipsum solor amet" buttonText="Teste" />
        <div className="url-developer-container">
            <YoutubeDeveloper url="https://www.youtube.com/embed/KAOdjqyG37A?si=j6cIcE17v5W4G2gD" />
        </div>
    </section>
}

export default SideContentCard;