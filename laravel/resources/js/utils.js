export function phoneMask(input) {
    let cleaned = ('' + input).replace("/\D\g", '')
    let formatted = '';

    if (cleaned.length > 0) {
        formatted = '+7 ';
    }
    if (cleaned.length > 1) {
        formatted += '(' + cleaned.substring(1, 4);
    }
    if (cleaned.length > 4) {
        formatted += ') ' + cleaned.substring(4, 7);
    }
    if (cleaned.length > 7) {
        formatted += '-' + cleaned.substring(7, 9);
    }
    if (cleaned.length > 9) {
        formatted += '-' + cleaned.substring(9, 11);
    }

    return formatted
}
