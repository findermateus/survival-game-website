import DefaultButton from "~/Components/Assets/DefaultButton";
import "./styles.css"
import React from "react";
import {Link} from "react-router";

interface ContainerButtonProps {
    title: string,
    buttonText: string
}

const ContainerButton: React.FC<ContainerButtonProps> = (props) => {
    const { title, buttonText } = props;
    return <div className="container-button">
        <h3 className="linear-title-right container-title">{title}</h3>
        <DefaultButton>
            <a href="https://itch.io/">{buttonText}</a>
        </DefaultButton>
    </div>
}

export default ContainerButton;