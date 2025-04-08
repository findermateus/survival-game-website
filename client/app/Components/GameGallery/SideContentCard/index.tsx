import "./styles.css";
import ContainerButton from "~/Components/Assets/ContainerButton";
import YoutubeDeveloper from "~/Components/Assets/YoutubeDeveloper";

const SideContentCard = () => {
    return <section className="side-content-card">
        <ContainerButton title="Ficou interessado mas ainda não se convenceu?" buttonText="Ver mais" />
        <div className="url-developer-container">
            <YoutubeDeveloper url="https://www.youtube.com/embed/KAOdjqyG37A?si=j6cIcE17v5W4G2gD" />
        </div>
    </section>
}

export default SideContentCard;